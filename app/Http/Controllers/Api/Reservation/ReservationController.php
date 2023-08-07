<?php

namespace App\Http\Controllers\Api\Reservation;

use App\Exceptions\AccessErrorException;
use App\Exceptions\AlreadyReservedException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Presenters\ReservationPresenter;
use App\Http\Requests\Api\Admin\GetReservationCollectionPaginateRequest;
use App\Http\Requests\Api\Reservation\StoreReservationRequest;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use App\Services\DateService;
use Illuminate\Http\JsonResponse;

class ReservationController extends ApiController
{
    public function __construct(private readonly ReservationRepository $reservationRepository)
    {}
    /**
     * @param  GetReservationCollectionPaginateRequest  $request
     * @param  ReservationPresenter  $presenter
     * @return JsonResponse
     */
    public function index(GetReservationCollectionPaginateRequest $request, ReservationPresenter $presenter): JsonResponse
    {
        $page = $request->get('page') ?? Reservation::DEFAULT_PAGE;
        $perPage = $request->get('per_page') ?? Reservation::getPerPage();
        $orderBy = $request->get('sort') ?? Reservation::DEFAULT_SORT;
        $direction = $request->get('direction') ?? Reservation::DEFAULT_DIRECTION;

        $reservations = auth()->user()->reserves();
        $paginator = $reservations->orderBy($orderBy, $direction)
            ->paginate(
                $perPage,
                ['*'],
                null,
                $page
            );

        return $this->createPaginatedResponse($paginator, $presenter);
    }

    /**
     * @param  Reservation  $reservation
     * @param  ReservationPresenter  $presenter
     * @return JsonResponse
     */
    public function show(Reservation $reservation, ReservationPresenter $presenter): JsonResponse
    {
        if ($reservation->user_id !== auth()->id()) {
            throw new AccessErrorException();
        }

        return $this->successResponse($presenter->present($reservation));
    }

    /**
     * @param  StoreReservationRequest  $request
     * @param  ReservationPresenter  $presenter
     * @return JsonResponse
     */
    public function store(StoreReservationRequest $request, ReservationPresenter $presenter): JsonResponse
    {
        $reservationInterval = DateService::getDatesFromRange($request->date('date_start'), $request->date('date_end')->subDays());

        foreach ($reservationInterval as $date)
        {
            if (!$this->reservationRepository->reservable($date)) {
                throw new AlreadyReservedException();
            }
        }

        $reservation = Reservation::query()->create([
            'date_start' => $request->date('date_start'),
            'date_end' => $request->date('date_end'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'user_id' => auth()->id(),
        ]);

        return $this->successResponse($presenter->present($reservation->refresh()));
    }

    /**
     * @param  Reservation  $reservation
     * @return JsonResponse
     */
    public function destroy(Reservation $reservation): JsonResponse
    {
        if ($reservation->user_id !== auth()->id()) {
            throw new AccessErrorException();
        }
        $reservation->delete();

        return $this->emptyResponse();
    }
}

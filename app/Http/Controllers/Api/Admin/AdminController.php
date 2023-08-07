<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Http\Presenters\ReservationPresenter;
use App\Http\Requests\Api\Admin\GetReservationCollectionPaginateRequest;
use App\Http\Requests\Api\Admin\UpdateStatusReserveByAdminRequest;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;

class AdminController extends ApiController
{
    public function index(
        GetReservationCollectionPaginateRequest $request,
        ReservationPresenter $presenter
    ): JsonResponse {
        $page = $request->get('page') ?? Reservation::DEFAULT_PAGE;
        $perPage = $request->get('per_page') ?? Reservation::getPerPage();
        $orderBy = $request->get('sort') ?? Reservation::DEFAULT_SORT;
        $direction = $request->get('direction') ?? Reservation::DEFAULT_DIRECTION;

        $reservations = Reservation::query();

        if ($date = $request->date('date')) {
            $dateInterval = [$date->startOfDay()->toDateTimeString(), $date->endOfDay()->toDateTimeString()];
            $reservations->whereBetween('date_start', $dateInterval)
                ->orWhereBetween('date_end', $dateInterval)
                ->orWhereBetween('created_at', $dateInterval);
        }

        $paginator = $reservations->orderBy($orderBy, $direction)
            ->paginate(
                $perPage,
                ['*'],
                null,
                $page
            );

        return $this->createPaginatedResponse($paginator, $presenter);
    }

    public function show(Reservation $reservation, ReservationPresenter $presenter): JsonResponse
    {
        return $this->successResponse($presenter->present($reservation));
    }

    public function update(
        UpdateStatusReserveByAdminRequest $request,
        Reservation $reservation,
        ReservationPresenter $presenter
    ): JsonResponse {
        $reservation->update([
            'status' => $request->input('status')
        ]);

        return $this->successResponse($presenter->present($reservation));
    }

    public function destroy(Reservation $reservation): JsonResponse
    {
        $reservation->delete();

        return $this->emptyResponse();
    }
}

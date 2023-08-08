<template>
    <div>
        <div class="container">
            <div class="page-title main-title-container">
                <div class="page-title__title">
                    <div class="page-title__title__text text-uppercase">Забронюйте
                        <div class="text-with-ellipse">в Hotel Logo</div>
                    </div>
                    <div class="page-title__title__text w-100 text-center text-uppercase">своє місце</div>
                </div>
            </div>
        </div>
        <div class="reserve">
            <div class="container">
                <form method="post" @submit.prevent="onReserve()">
                    <div class="row row-gap-sm-2">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <datepicker wrapper-class="reserve__date-wrapper"
                                        input-class="form-floating"
                                        format="yyyy-MM-dd"
                                        v-model="reservation.date_start"
                                        placeholder="дата заїзду"
                                        :disabled-dates="disabledDates"
                            ></datepicker>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <datepicker wrapper-class="reserve__date-wrapper"
                                        input-class="form-floating"
                                        format="yyyy-MM-dd"
                                        v-model="reservation.date_end"
                                        placeholder="дата виїзду"
                                        :disabled-dates="disabledDates"
                                        theme="dark"
                            ></datepicker>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-floating gap-sm-2">
                                <input type="tel" class="form-control" name="phone" v-model="reservation.phone">
                                <label for="phone" class="text-uppercase">номер телефону</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="form-floating gap-sm-2">
                                <input type="text" class="form-control" name="email" v-model="reservation.email">
                                <label for="email" class="text-uppercase">e-mail</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit"
                                    class="d-block mx-sm-auto btn btn-lg btn-primary text-white btn-hover-white text-uppercase text-center">
                                забронювати
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="reservation-history container-fluid">
            <div class="container">
                <div class="page-title" style="height: 200px">
                    <div class="page-title__title second">
                        <div class="page-title__title__text second text-left text-uppercase position-relative">історія
                            <div class="text-with-ellipse">ваших</div>
                        </div>
                        <div class="page-title__title__text second text-center text-uppercase">Бронювань</div>
                    </div>
                </div>
            </div>
            <div class="din-table d-flex flex-row flex-sm-column">
                <div class="din-table__heading d-sm-flex text-uppercase">
                    <div class="din-table__heading__row w-100 d-flex  flex-1 flex-col">
                        <span>test</span>
                    </div>
                    <div class="din-table__heading__row w-100 d-flex  flex-1 flex-col">
                        <span>test</span>
                    </div>
                    <div class="din-table__heading__row w-100 d-flex  flex-1 flex-col">
                        <span class="text-uppercase">test</span>
                    </div>
                    <div class="din-table__heading__row w-100 d-flex flex-1 flex-col">
                        <span>test</span>
                    </div>
                </div>
                <div class="d-flex flex-row flex-sm-column">
                    <div class="din-table__row d-flex flex-column bg-white pr-4 flex-sm-row text-uppercase">
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                    </div>
                    <div class="din-table__row d-flex flex-column bg-white pr-4 flex-sm-row text-uppercase">
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                    </div>
                    <div class="din-table__row d-flex flex-column bg-white pr-4 flex-sm-row text-uppercase">
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                        <div class="din-table__row__item flex-1">
                            <div class="d-flex flex-wrap px-2 pb-6 text-third last:pb-0">
                                <span>col</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "dashboard",
    data() {
        return {
            reservation: {
                date_start: null,
                date_end: null,
                phone: null,
                email: '',
            },
            disabledDates: {
                to: new Date(),
                dates: [
                    new Date('2023-08-17'),
                ]
            },
            user: this.$store.state.auth.user
        }
    },
    methods: {
        onReserve() {
            console.log(this.reservation);
            axios.post('api/reservations', this.reservation).then(data => {
                console.log(data);
            }).catch(error => {
                console.log(error);
            });
            console.log(this.disabledDates.dates);
        }
    }
}
</script>

<style lang="scss">
@import "resources/sass/variables";
@import "resources/sass/font/AvenirNextCyr";

.reserve {
    margin: 40px auto;

    .form-control {
        max-width: 280px;
    }

    &__date-wrapper #calendar-div {
        background-color: $light-white;
        height: 50px;
        width: 100%;

        .vuejs3-datepicker {
            &__value {
                border-bottom: 1px solid $green !important;
                border-top: none !important;
                border-left: none !important;
                border-right: none !important;
                border-radius: 0 !important;
                max-width: 280px;
            }

            &__content {
                text-transform: uppercase;
                font-family: $font-family-base-avenir;
                font-size: 14px;
                font-weight: 700;
                line-height: 20px;
                color: $green;
            }
        }
    }

    .form-floating {
        .form-control {
            height: 50px;
            min-height: initial;
        }
    }
}

.reservation-history {
    .page-title {
        max-width: 640px;
    }
}
.main-title-container{
    padding-top: 80px;
    padding-bottom: 40px;
    margin: 0 150px;
}
.page-title {
    &__title {

        &__text {
            font-family: $font-family-base-cormorant !important;
            font-size: 70px;
            font-weight: 400;
            line-height: 85px;
            letter-spacing: 0em;
            text-align: left;
            color: $green;
        }

        .text-with-ellipse {
            font-family: $font-family-base-caravan !important;
            font-size: 90px;
            font-weight: 400;
            text-align-last: center;
            text-transform: none;
            color: $primary;
            position: absolute;
            transform: rotate(-10deg);
            border-radius: 50%;
            border: 1px solid;

            height: 200px;
            width: 530px;
        }
    }


    &__title__text.second {
        font-size: 50px;
        font-weight: 400;
        line-height: 50px;
    }

    &__title.second {
        padding-top: 60px;

        .text-with-ellipse {
            font-size: 100px;
            text-align-last: center;
            text-transform: none;

            left: 160px;
            top: -40px;
            height: 151px;
            width: 362px;
        }

        &__title:last-child {
            margin-left: 100px;
            text-align: left!important;
        }
    }



}

.din-table {
    overflow: auto;

    &__heading {
        padding: 20px 50px;

        &__row {
            font-family: $font-family-base-avenir;
            font-size: 14px;
            font-weight: 700;
            line-height: 20px;
            letter-spacing: 0em;
            text-align: left;
            color: $gray;
        }
    }

    &__row {
        font-family: $font-family-base-avenir;
        font-size: 14px;
        font-weight: 700;
        line-height: 20px;
        color: $green;
        padding: 20px 50px;
        margin-bottom: 15px;


        .status-processing {
            color: $yellow !important;
        }

        .status-declined {
            color: $red !important;
        }

        .status-approved {
            color: $teal !important;
        }
    }

    @media screen and (max-width: 600px) {
        &__heading {
            padding: 10px;

            &__row {
                margin-bottom: 5px;
            }
        }
        &__row {
            padding: 10px;
            margin-right: 10px;
            margin-bottom: 5px;

            &__item {
                margin-bottom: 5px;
            }
        }
    }
}

</style>

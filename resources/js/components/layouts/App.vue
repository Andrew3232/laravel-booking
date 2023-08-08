<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <router-link :to="{name:'dashboard'}" class="nav-link" :class="{active: $route.name === 'dashboard'}">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name:'admin'}" class="nav-link" :class="{active: $route.name === 'admin'}">Admin</router-link>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <ul class="navbar-nav" v-if="authenticated">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ user.email }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav" v-else>
                            <li class="nav-item dropdown">
                                <router-link class="nav-link" :to="{name:'login'}">Login</router-link>
                            </li>
                            <li class="nav-item dropdown">
                                <router-link class="nav-link" :to="{name:'register'}">Register</router-link>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
        <header class="header mt-4">
            <div class="container">
                <div class="d-grid gap-2 gap-sm-0 d-sm-flex justify-content-between items-center align-content-center">

                    <div class="phone__container align-self-center">
                        +38 (044) 299 27 66
                    </div>
                    <div class="header__logo">
                        <a href="/">
                            <img src="/img/logo.svg">
                        </a>
                    </div>
                    <div class="header__right align-self-center">
                        <button class="btn btn-outline-primary icon-link-hover text-uppercase btn-hover-white">
                            забронювати
                        </button>
                    </div>
                </div>
                <hr>
            </div>
        </header>
        <main class="mt-3">
            <router-view></router-view>
        </main>
        <div class="footer bg-dark-green text-white mt-4">
            <div class="container">
                <div class="d-sm-flex justify-content-between">
                    <div class="flex-column flex-sm-row footer__left">
                        <div class="footer__logo">
                            <a href="/">
                                <img src="/img/white_logo.svg">
                            </a>
                        </div>
                    </div>
                    <div class="flex-column flex-sm-row footer__middle">
                        <button class="btn btn-outline-light text-white btn-hover-dark-green text-uppercase">
                            забронювати
                        </button>
                    </div>
                    <div class="align-self-center flex-column flex-sm-row footer__right">
                        <div class="text-sm">
                            <div class="footer__menuitem d-flex  justify-content-md-start">
                                <div class="footer__menuitem__icon">
                                    <img src="/img/phone.svg" height="14" width="14">
                                </div>
                                <div class="footer__menuitem__text">+38 (044) 299-27-66</div>
                            </div>
                            <div class="footer__menuitem mt-2 d-flex justify-content-md-start">
                                <div class="footer__menuitem__icon">
                                    <img src="/img/phone.svg" height="14" width="14">
                                </div>
                                <div class="footer__menuitem__text">+38 (044) 299-27-66</div>
                            </div>
                            <div class="footer__menuitem mt-2 d-flex justify-content-md-start">
                                <div class="footer__menuitem__icon">
                                    <img src="/img/google-place.svg" height="14" width="14"></div>
                                <div class="footer__menuitem__text">пр-т. В. Лобановського 25/16 Київ, Україна</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    name: "App",
    data() {
        return {
            user: this.$store.state.auth.user
        }
    },
    computed :{
      ...mapGetters({
          authenticated: 'auth/authenticated',
      })

    },
    methods: {
        ...mapActions({
            signOut: "auth/logout"
        }),
        async logout() {
            await axios.post('/logout').then(({data}) => {
                this.signOut()
                this.$router.push({name: "login"})
            })
        }
    }
}
</script>

<style scoped lang="scss">
body {
    background: #FEFBF9;
}

.phone__container {
    font-family: "Avenir Next Cyr Demi";
    font-size: 16px;
    font-weight: 700;
    line-height: 20px;
    letter-spacing: 0em;
    text-align: left;
}

.footer {
    padding-top: 30px;
    padding-bottom: 50px;

    &__left{
        width: 200px;
        height: 90px;
    }

    &__middle{
        margin-top: 20px;
    }
    &__right{
        margin-top: 20px;
    }

    &__menuitem {
        &__icon {
            margin-right: 10px;
        }

        &__text {
            font-family: "Avenir Next Cyr Regular";
            font-size: 16px;
            font-weight: 400;
            line-height: 20px;
            letter-spacing: 0em;
            text-align: left;
            max-width: 200px;
        }
    }
}
</style>

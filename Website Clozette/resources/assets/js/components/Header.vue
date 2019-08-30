<template>
     <div class="container" id="app">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="logo-continer" align="center">
	<a href="/"  onclick="_gaq.push(['_trackEvent', 'Home', 'click_header_logo', 'Clozette Header Logo']);">
    <img src="//cimg.clozette.co.id/img/static/cid-new-logo.png" ></a>
    <div class="header clearfix"></div>
    <!-- Navigation -->
    <!-- userObj comes from App.vue -->
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <div class="container">
            <router-link :to="{ path: '/' }" class="navbar-brand"><img src="//cimg.clozette.co.id/img/static/cid-new-logo.png"></router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                
                <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                    <router-link :to="{ path: '/insider' }" class="nav-link">Insider
                                 <span class="sr-only"></span>                        
                    </router-link>
                    </li>
                    
                    <li class="nav-item active">
                    <router-link  :to="{ path: '/tutorials' }" class="nav-link">Tutorials
                                 <span class="sr-only"></span>                        
                    </router-link>
                    </li>
                    <li class="nav-item active">
                    <router-link v-if="!isLoggedIn" :to="{ path: '/register' }" class="nav-link">Register
                        <span class="sr-only"></span>                        
                    </router-link>
                    </li>

                    <li class="nav-item active">
                    <router-link v-if="!isLoggedIn" :to="{ path: '/login' }" class="nav-link">Login
                                 <span class="sr-only"></span>                        
                    </router-link>
                    </li>
                    <li class="nav-item active">
                    <router-link v-if="isLoggedIn" :to="{ path: '/createpost' }" class="nav-link">Create Post
                                 <span class="sr-only"></span>                        
                    </router-link>
                    </li>
                     <li class="nav-item active">
                    <router-link v-if="isLoggedIn" :to="{ path: '/profile' }" class="nav-link">Profile
                                 <span class="sr-only"></span>                        
                    </router-link>
                    </li>
                    <li class="nav-item active">
                        <a style="cursor: pointer;" v-if="isLoggedIn" :to="{ path: '/' }" @click.prevent="logout" class="nav-link">Logout
                           <span class="sr-only"></span>                        
                        </a>                   
                    </li>
                </ul>
            </div>
        </div>            
    </nav>
    </div>
    <br/>
</div>

</template>

<script>
import Icon from 'vue-awesome/components/Icon'
    export default {        
        methods: {
            logout() {
                this.$userHelper.logout();
                this.$router.push('/login');
            }
        },
        computed: {
            isLoggedIn() {
                return this.$userHelper.isLoggedIn();
            }
        }
    }
</script>
<style scoped>
img{
    size: 500;
}
</style>
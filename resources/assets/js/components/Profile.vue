<template>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                     
                    <div class="widget-user-header text-white" style="background-image:url('./post_image/background.jpg'); background-size: cover;">                        
                        
                        <div class="profilePage-profilePic">
                            <img alt="Avatar for vinnysihombing" src="https://cimgr.clozette.co.id/indo/f_jpg,w_300,c_fit/uploads/da25bfedc80c40dfa8e78afc8e19616b/458c3bc24db2469f944ec3a7d83dc896.png" 
                            style="float: left;margin-top: 90px; margin-right: 90px; margin-bottom: 90px; margin-left: 9px;">
                        </div>		
                        <!-- <div class="profilePage-user-Name">{{registerFormData.name}}</div> -->
                    </div>
                   <!-- <div class="widget-user-image">
                         <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar"> 
                      <img alt="Avatar for vinnysihombing" src="//cimg-indo.clozette.co.id/static/default-profile-picture_2.jpg" >
                          <h3 class="widget-user-username"> Hello, {{ registerFormData.name }}</h3> -->
                        
                        <h3 class="widget-user-username">{{registerFormData.name}}</h3>
                     <h5 class="widget-user-dec">{{registerFormData.email}}</h5>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">3.200</h5>
                                    <span class="description-text">Followers</span>
                                </div>
                    </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13.000</h5>
                                <span class="description-text">Following</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35.000 </h5>
                                <span class="description-text">Likes</span>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
  
<!--SUB NAVBAR-->
<div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                        <li class="nav-item"><a class="nav-link active show" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Activity Tab -->
                            <div class="tab-pane" id="activity" style="font-color:black;">
                                <h3 class="text-center">User Activity</h3>
                                <!-- Bagian Activity-->
                                <div class="loop-entry-main">
                                    <img data-v-ba7cd168="" src="https://cimgr.clozette.co.id/indo/f_jpg,w_300,c_fit/uploads/da25bfedc80c40dfa8e78afc8e19616b/8bbb7e6b1104415cadd8d1c3c0116211.jpg" id="photo-list-ab53d32de36e4864863b60e846f7f64f" class="mphoto">
		                            <div class="entry-text overflow-hidden">
			
			                        <div class="caption-hashtag">example</div>
                                <!-- <div class="avatarc">
                                    <a href="/u/vinnysihombing"><img class="avatar" src="https://cimg-indo.clozette.co.id/static/default-profile-picture_3.jpg" style="size:12px"></a>
                                </div>-->
                                <div class="avatar-by">
                                    by <a href="/u/vinnysihombing">vinnysihombing</a>
                                    <div class="avatar-onto">onto <a href="/u/vinnysihombing/closet">Closet</a></div><div class="avatar-onto"> views</div>
                                </div>
		                    </div>
                            <div class="can-edit">
                                <a href="/u/vinnysihombing/edit-photo:ab53d32de36e4864863b60e846f7f64f" target="_blank">Edit</a> | 
                                <a href="javascript:void(0)" onclick="cz.func.remove.click(this, 'https://www.clozette.co.id/u/vinnysihombing/items', 'https://cimgr.clozette.co.id/indo/f_jpg,w_300,c_fit/uploads/da25bfedc80c40dfa8e78afc8e19616b/ab53d32de36e4864863b60e846f7f64f.png', 'ab53d32de36e4864863b60e846f7f64f');">Delete</a>
                            </div>
	                    </div>
                    </div>
                            <!-- Setting Tab -->
                            <div class="tab-pane active show" id="settings">
                                <form class="form-horizontal">
                                    <!-- v-on:submit="updateData()" -->
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" v-model="registerFormData.name"  
                                    id="inputName" placeholder="Name">
                                     <!-- <has-error :form="registerFormData" field="name"></has-error>                                    -->
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" v-model="registerFormData.email" placeholder="Email">    
                                    <!-- <has-error :form="registerFormData" field="email"></has-error>                                     -->
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Profile Photo</label>
                                    <div class="col-sm-12">
                                        <input type="file" @change="updateProfile" name="photo" class="form-input">
                                    </div>

                                </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" @click.prevent="updateData"  class="btn btn-primary">
                                        <!--@click.prevent="update"-->
                                        Update
                                    </button>
                                </div>
                            </div>
                                
                                </form>
                            </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
          </div>
          <!-- end tabs -->
        </div>
    <!-- </div> -->
</template>

<script>
    export default {
        data() {
            return {
                registerFormData: {
                name: '',
                email: '',
                photo: ''
            }
            };
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            getProfilePhoto(){
                let photo = (this.registerFormData.photo.length > 200) ? this.registerFormData.photo : "img/profile/"+ this.registerFormData.photo ;
                return photo;
            },
            getUserProfile() {
                this.$commonHelper.getAxios('profile', true).then(data => {
                    if (data.status === 'success' && data.response_code === 200) {
                        this.userObj = data.data;
                    } else {

                    }
                }).catch(error => {
                    console.log(error.response);
                });
            },
            updateData(){
                event.preventDefault();        
                let app = this;
                let newProfile = app.registerFormData;
                this.$commonHelper.postAxios('profile', newProfile, true)
                    .then(function (resp) {
                        app.$router.push({path: '/profile'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not edit your post");
                });
            },
            updateProfile(e){
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    this.registerFormData.photo = reader.result;
                }
                reader.readAsDataURL(file);
            }
        },
        computed: {
            isLoggedIn() {
                return this.$userHelper.isLoggedIn();
            }
        },
        created() {
            if (!this.isLoggedIn) {
                this.$router.push('/login');
            } else {
                this.getUserProfile();
            }
        },
      
    }
</script>

<!--
<script>
export default {
    
    date(){
        return{
         registerFormData: {
                name: '',
                email: ''
            }
        }
    },  
    mounted(){  
        console.log('Component mounted.')
    },
    created(){
      axios.get("user/profile")
      .then(({ data }) => (this.form.fill(data)));      
    }
}
</script>
-->
<style scoped>
.profilePage-masthead{
    width:50%; height:75%;
}
.widget-user-header{
    background-position: center center;
    background-size:cover;
    height: 250px;
}
.nav-item{
    color:black;
}
.nav-link{
    color:black;
}
.heartbeat-icon-profile-text {
    cursor: pointer;
    color: #000000;
    font-family: 'AvenirNext-Regular', sans-serif;
    font-size: 12px;
}
a {
  color: black;
}
</style>
<!--
            // update(){
            //     if(this.registerFormData.password == ''){
            //         this.registerFormData.password = undefined;
            //     }
            //     this.registerFormData.put('profile')
            //     .then(()=>{

            //     })
            //     .catch(()=>{

            //     });
            // },



            //  this.$Progress.start();
            //     if(this.registerFormData.password == ''){
            //         this.registerFormData.password = undefined;
            //     }
            //     this.registerFormData.put('profile')
            //     .then(()=>{
            //          Fire.$emit('AfterCreate');
            //         this.$Progress.finish();
            //     })
            //     .catch(() => {
            //         this.$Progress.fail();
            //     });
            // },
-->
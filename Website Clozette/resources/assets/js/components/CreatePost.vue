<template>
  <div>
    <h1>Create Posts</h1>
    <form v-on:submit="createPost()">
        <div class="form-group">
            <label for="title">Title</label>
            <input v-model="posts.title" type="text" class="form-control" id="title" placeholder="Post Title" required>
          </div>
          <div class="form-group">
            <label for="slug">Sub Title</label>
            <input v-model="posts.subtitle" type="text" class="form-control" id="subtitle" placeholder="Sub Title" required >
          </div>
          <div class="form-group">
            <label for="category_id">Categories</label>
            <select class="form-control" v-model="selected" >
              <option v-for="option in categories" v-bind:key="option.slug" v-bind:value="option.slug" placeholder="Select one:" required>
              {{option.name}}
               </option>
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="image">Post Cover Image</label>
            <div class="dropbox">
              <div class="col-md-3" v-if="image">
                <img :src="image" class="img-responsive" height="70" width="90">
              </div>
              <div >
                  <input type="file" v-on:change="onImageChange" class="form-control">
              </div>
            </div>
            
          </div> -->
          <div class="form-group">
            <label for="body">Post Body</label>
            <vue-editor v-model="posts.body"> </vue-editor>
          </div>      
        <br /> 
        <div class="form-group">
          <button class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>
</template>
<script>

import { VueEditor } from "vue2-editor";
  export default {
    components: {
          VueEditor,
          
          },
    data: function(){
        return{
        //   image: '',
          
          posts:{
            title: '',
            subtitle: '',
            // image: '',
            body: '',
          },
          category_post:{
            category_id: '',
          },
          categories:{

          },
          selected: '',
        }
    },

    mounted(){
      this.$commonHelper.getAxios('get-all-categories', false)
      .then(category_post => (this.categories = category_post))
    },
  
    methods: {
      
    createPost(){
      event.preventDefault();        
      let app = this;
      let newPost = app.posts;
      this.$commonHelper.postAxios('postusers', newPost, true)
        .then(function (resp) {
            app.$router.push({path: '/'});
        })
        .catch(function (resp) {
            console.log(resp);
            alert("Could not create your post");
        });
        }
     },

//   onImageChange(e) {
//     let files = e.target.files || e.dataTransfer.files;
//       if (!files.length)
//         return;
//       this.createImage(files[0]);
//    },
//   createImage(file) {
//     let reader = new FileReader();
//     let vm = this;
//     reader.onload = (e) => {
//       vm.image = e.target.result;
//     };
//     reader.readAsDataURL(file);
//     },
  }
</script>
<template>
<div>
 <div class="card" v-if="categories.length > 0">
    <div class="card-body">
                <div class="row">
                    <ul class="list-unstyled mb-0">
                        <li v-for="category in categories"  :key="category"> 
                         <button class="button button1"><router-link :to="{ path: '/post/category/' + category.slug }">{{ category.name }} ({{ category.post_count }})</router-link> </button>                           
                        </li>    
                    </ul>
                </div>
         </div>
    </div>
    <Post/>
</div>                
</template>
<script>
import Post from './Post'
    export default {
         name:  'App',
        components:{
            Post
        },
         data() {
            return {
                categories:[],
            };
        },
        methods : {
            read() {
                this.$commonHelper.getAxios(`get-sidebar/insider`).then(data => {
                    this.categories = data.categories;
                }).catch(error => {
                    console.log(error);
                });
            }
        },
        created() {
            this.read();
        }
    }
</script>
<style scoped>
a {
  color: black;
}
li {
    display:table;
}
.card{
  transition: 0.3s;
  width: 100%;
  height:80%;
}
.button1:hover {
  background-color: #555555;
  color: white;
}
.button{
  background-color: rgb(226, 226, 226); /* Green */
  border:black; 
  /* padding: 16px 32px; */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  float:none;
}
</style>
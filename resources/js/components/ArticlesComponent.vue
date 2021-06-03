<template>
    <div class="container">
        <modal-add-article @article-added="refresharticle"></modal-add-article>
        <modal-edit-article @article-updated="refresharticle"></modal-edit-article>
        <div class="row justify-content-center">
            <div class="col-md-8">
               <table class="table">
                   <thead>
                       <tr>
                           <th>Id</th>
                           <th>Titre</th>
                           <th>Contenu</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr v-for="post in articles.data" :key="post.id">
                           <td scope="row">{{ post.id }}</td>
                           <td>{{ post.title }}</td>
                           <td>{{ post.content }}</td>
                           <td>
                               <button class="btn btn-info btn-sm"><span class="fas fa-edit"></span></button>
                               <button class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></button>
                           </td>
                       </tr>
                   </tbody>
               </table>
               <pagination :data="articles" @pagination-change-page="getResults"></pagination>
               
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
          return {
              articles : {} // on stockera les datas ici
          }  
        },

        created(){
           
            axios
                .get('http://laravel0.local/articlesbdd')
                .then(response => {
					this.articles = response.data;
				})
                .catch(error => console.log(error))
        },

        methods: {
		// Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('http://laravel0.local/articlesbdd?page=' + page)
                    .then(response => {
                        this.articles = response.data;
                    });
            }, 
            refresharticle: function(articles){
                $('#exampleModal').modal('hide');
                $('#exampleModal form')[0].reset();
                this.articles = articles.data;
            }
        },
        

        mounted() {
            
            console.log('Component mounted.')
        }
    }
</script>

<template>
    <div class="container">
        <modal-add-article @article-added="refresharticle()"></modal-add-article>
        <modal-edit-article @article-updated="refresharticle()" v-bind:articleToEdit="dataArticle"></modal-edit-article>
        <div class="row justify-content-center">
            <div class="col-md-8">
               <table class="table">
                   <thead>
                       <tr>
                           <th>Id</th>
                           <th class="tab_el_title">Titre</th>
                           <th class="tab_el_content">Contenu</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr v-for="post in articles.data" :key="post.id">
                           <td scope="row">{{ post.id }}</td>
                           <td class="tab_el_title">{{ post.title }}</td>
                           <td class="tab_el_content">{{ post.content }}</td>
                           <td>                             
                               <button ref="buttonEditArticle" class="btn btn-info btn-sm" @click.prevent="getArticle(post.id)"  data-toggle="modal" data-target="#modalEditArticle">
                                   <span class="fas fa-edit"></span>
                                </button>
                               <button class="btn btn-danger btn-sm" @click.prevent="deleteArticle(post.id)"><span class="fas fa-trash"></span></button>
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
              articles : {}, // on stockera les datas ici
              dataArticle : {}
          }  
        },
        created(){
            this.getAllArticles();
        },

        methods: {
		// Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                axios.get('/articlesbdd?page=' + page)
                    .then(response => {
                        this.articles = response.data;
                    });
            }, 
            getAllArticles : function(){
                axios
                .get('/articlesbdd')
                .then(response => {
					this.articles = response.data;
				})
                .catch(error => console.log(error))
            },
            refresharticle: function(articles){
                $('#exampleModal').modal('hide');//
                $('#exampleModal form')[0].reset();
                this.getAllArticles();
            },
           getArticle: function(id){
              
               axios
                .get('/showArticle/' + id)
                .then(response => {
					this.dataArticle = response.data;
				})
                .catch(error => console.log(error))
           },
           deleteArticle: function(id){
               
              if(confirm("Voulez-vous vraiment supprimer cet article ?")){
                axios
                .post('/deleteArticle/' + id)
                .then(response => {
                    this.getAllArticles();
                })
                .catch(error => console.log(error))
            }
           }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<template>
    <div>
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
            Ajouter un article
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvel article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre de l'article'</label>
                        <input type="text" v-model="title" class="form-control" id="titre" placeholder="Enter le titre">
                        <small id="titreHelp" class="form-text text-muted">Veuiller renseigner un titre à votre article</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contenu</label>
                        <textarea placeholder="Le contenu de votre article" class="form-control" v-model="content" name="" id="content" cols="30" rows="10"></textarea>
                        <small id="contentHelp" class="form-text text-muted">Veuiller renseigner un contenu à votre article</small>
                    </div>
                    <button id="btn_add_article" @click="storeArticle" class="btn btn-primary">Enregister</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
export default {

    data(){
        return {
            title : '',
            content : ''
        }
    },

    methods : {
        storeArticle(){
            axios.post('http://laravel0.local/storeArticle', {
                title : this.title,
                content : this.content
            })
            .then(function (response) {
               this.$emit('article-added', response);
            })
            .catch(function (error) {
                alert(error);
            });
        }
    },

    mounted(){
        console.log('modal add article component');
    }
}
</script>
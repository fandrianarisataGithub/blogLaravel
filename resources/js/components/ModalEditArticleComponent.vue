<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="modalEditArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier l'article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre de l'article'</label>
                        <input type="text" v-model="articleToEdit.title" class="form-control" id="titre" placeholder="Enter le titre">
                        <small id="titreHelp" class="form-text text-muted">Veuiller renseigner un titre à votre article</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contenu</label>
                        <textarea v-model="articleToEdit.content" placeholder="Le contenu de votre article" class="form-control" name="" id="content" cols="30" rows="10"></textarea>
                        <small id="contentHelp" class="form-text text-muted">Veuiller renseigner un contenu à votre article</small>
                    </div>
                    <button id="btn_add_article" @click.prevent="editArticle(articleToEdit.id)" class="btn btn-primary">Modifier</button>
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

    props : ['articleToEdit'],

    methods : {
        editArticle(id){
            axios.post('/editArticle/' + id, {
                title : this.articleToEdit.title,
                content : this.articleToEdit.content
            })
            .then(response => {
               this.$emit('article-updated', response);
               $('#modalEditArticle').modal('hide');
                $('#modalEditArticle form')[0].reset();
            })
            .catch(function (error) {
                alert(error);
            });
        }
    },

    mounted(){
        console.log(this.dataArticle)
        console.log('modal edit article component');
    }
}
</script>
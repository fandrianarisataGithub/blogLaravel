<template>
    <div>
        <a href="#" @click="deleteConfirm('delele-product-form-39')">Delete</a>
        <form id="delete-product-form-39" action="http://myapp.test/product/39/delete" method="POST"></form>
    </div>
</template>
<script>
export default {
    methods : {
        deleteConfirm : function(formId)
        {
            Swal.fire({
                icon: 'warning',
                text: 'Do you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#e3342f',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    }
}
</script>
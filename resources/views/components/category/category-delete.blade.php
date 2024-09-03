<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="save-form">
                    <div class="mb-3">
                        <h3 class="text-danger text-center">Delete!!</h3>
                        <p class="text-center">Once delete, you can't get it back.</p>
                        <input type="hidden" id="deleteID">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="itemDelete()" type="button" id="conformDelete" class="btn shadow-sm btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function itemDelete(){
        let id = document.getElementById('deleteID').value;
        document.getElementById('delete-modal-close').click();

        showLoader();
        let res=await  axios.post('/delete-category',{id:id})
        hideLoader();
        if(res.data===1){
            successToast("Request Completed")
            await getList();                       // for refresh list
        } else {
            errorToast("Request fail!")
        }


    }

</script>



























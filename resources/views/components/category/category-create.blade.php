<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Category Name:</label>
                        <input type="text" name="name" class="form-control" id="categoryName">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="save()" type="button" id="saveCategory" class="btn btn-primary">Save Category</button>
            </div>
        </div>
    </div>
</div>


<script>
    // document.getElementById('saveCategory').addEventListener('click', async function(){
    //     let  categoryName = document.getElementById('categoryName').value;
    //     if(categoryName.length === 0){
    //         errorToast("Category Required")
    //     } else {
    //         document.getElementById('close button').click();
    //         showLoader();
    //         let res = await axios.post("/create-category", {name:categoryName})
    //         hideLoader();
    //         if(res.status===201){
    //             successToast('Request Completed');
    //             document.getElementById('save-form').reset();
    //             await getList();
    //         }
    //         else {
    //             errorToast("Request fail")
    //         }
    //     }
    // })

    async function save(){
        let  categoryName = document.getElementById('categoryName').value;
        if(categoryName.length === 0){
            errorToast("Category Required")
        } else {
            document.getElementById('close button').click();
            showLoader();
            let res = await axios.post("/create-category", {name:categoryName})
            hideLoader();
            if(res.status===201){
                successToast('Request Completed');
                document.getElementById('save-form').reset();
                await getList();
            }
            else {
                errorToast("Request fail")
            }
        }
    }


</script>

























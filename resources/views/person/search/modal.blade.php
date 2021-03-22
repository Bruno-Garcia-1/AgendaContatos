<!-- Modal search person -->
<div class="modal fade" id="modalSearchPerson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSearchPersonLabel">Digite um nome para buscar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row mb-3">
                    <div class="form-floating">
                        <input name="modalName" id="modalName" action="{{ route('person.getPerson') }}" type="text" class="form-control"  placeholder="Nome" autocomplete="off">
                        <label for="floatingInput">Nome</label>
                    </div>
                </div>

                <div class="container">
                    <div class="row mb-3">
                            <div id="gridPerson">
                                <!-- jquery -->
                            </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>

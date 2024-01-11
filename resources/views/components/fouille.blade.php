   
    

    <div class="py-12">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fouilles</h2>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent="calculer">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <label for="typeFouille">Type de fouille</label>
                            <select wire:model="typeFouille" class="form-control">
                                <option value="isolé">Fouille isolé</option>
                                <option value="filante">Fouille filante</option>
                                <option value="radié">Fouille radié</option>
                                <option value="pieux">Fouilles sur pieux</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="quantiteMateriaux">Quantité de matériaux</label>
                            <input wire:model="quantiteMateriaux" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="largeur">Largeur</label>
                            <input wire:model="largeur" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="longueur">Longueur</label>
                            <input wire:model="longueur" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="profondeur">Profondeur</label>
                            <input wire:model="profondeur" type="number" class="form-control">
                        </div>
                    </div>


                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary">Calculer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



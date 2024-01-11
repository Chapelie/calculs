


    <div class="py-12">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fondations</h2>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent="calculer">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <label for="typeFouille">Type de fouille</label>
                            <select wire:model="typeFouille" class="form-control">
                                <option value="isolé">Fouille isolé</option>
                                <option value="Fouille B">Fouille B</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="petitCote">Petit côté</label>
                            <input wire:model="petitCote" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="grandCote">Grand côté</label>
                            <input wire:model="grandCote" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="epaisseurSemelle">Epaisseur semelle</label>
                            <input wire:model="epaisseurSemelle" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="hauteurSemelle">Hauteur semelle</label>
                            <input wire:model="hauteurSemelle" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="niveauAssise">Niveau d'assise</label>
                            <input wire:model="niveauAssise" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="dessusSemelle">Dessus semelle</label>
                            <input wire:model="dessusSemelle" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="dimensionsSectionFut">Dimensions section fut</label>
                            <input wire:model="dimensionsSectionFut" type="number" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="hauteurFut">Hauteur fut</label>
                            <input wire:model="hauteurFut" type="number" class="form-control">
                        </div>
                    </div>

                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <label for="volume">Volume</label>
                            <input type="text" class="form-control" disabled value="{{ $resultatVolume ?? '' }}">
                        </div>
                        <div class="mb-4">
                            <label for="superficie">Superficie</label>
                            <input type="text" class="form-control" disabled value="{{ $resultatSuperficie ?? '' }}">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary">Calculer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


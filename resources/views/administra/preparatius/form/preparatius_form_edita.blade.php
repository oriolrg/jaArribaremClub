
<div class="col-lg-12">
    <label for="description">Nom</label>
    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom..." value="{{isset($editdata) ? $editdata->nom : ''}}"  maxlength="60">
</div>
@if(!isset($editdata->imatges_id))
    <div class="col-lg-12">
        <label for="title">Imatge General</label>
        <input type="file" name="imatge" id="imatge" class="form-control" placeholder="Titol..." value="{{isset($editdata) ? $editdata->titol : ''}}"  maxlength="30">
    </div>
@endif


<div class="col-lg-12">
    <label for="description">Nom</label>
    <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom..." value="{{isset($editdata) ? $editdata->nom : ''}}"  maxlength="60">
</div>
<div class="col-lg-12">
    <label for="description">Descripció</label>
    <input type="text" name="descripcio" id="descripcio" class="form-control" placeholder="Descripcio..." value="{{isset($editdata) ? $editdata->descripcio : ''}}"  maxlength="360">
</div>
<div class="col-lg-12">
    <label for="description">Data de la caminada</label>
    <input type="date" name="data" id="data" class="form-control" placeholder="22-04-18..." value="{{isset($editdata) ? $editdata->data_caminada : ''}}"  maxlength="60">
</div>
<div class="col-lg-12">
    <label for="description">Numero de participants</label>
    <input type="number" name="participants" id="participants" class="form-control" placeholder="220" value="{{isset($editdata) ? $editdata->participants : ''}}"  maxlength="60">
</div>
<div class="col-lg-12">
    <label for="description">Població: </label>
    <select name="poblacio" id="poblacio">
        <option value="Sant Llorenç de Morunys" @isset ( $editdata->poblacio) {{ $editdata->poblacio == 'Sant Llorenç de Morunys'? "selected" : "" }} @endif>Sant Llrenç de Morunys</option>
        <option value="La Coma i la Pedra" @isset ( $editdata->poblacio) {{ $editdata->poblacio == 'La Coma i la Pedra'? "selected" : "" }} @endif>La Coma i la Pedra</option>
        <option value="Guixers" @isset ( $editdata->poblacio) {{ $editdata->poblacio == 'Guixers'? "selected" : "" }} @endif>Guixers</option>
    </select>
</div>
<div class="col-lg-12">
    <label for="description">Caminada numero</label>
    <input type="number" name="caminada_numero" id="caminada_numero" class="form-control" placeholder="22..." value="{{isset($editdata) ? $editdata->caminada_numero : ''}}"  maxlength="60">
</div>
<div class="col-lg-12">
    <label for="description">Direcció inici caminada</label>
    <input type="text" name="direccio_inici" id="direccio_inici" class="form-control" placeholder="C/ Major 15" value="{{isset($editdata) ? $editdata->direccio_inici : ''}}"  maxlength="60">
</div>
<div class="col-lg-12">
    <label for="description">Coordenades inici caminada</label>
    <input type="text" name="latitud" id="latitud" class="form-control" placeholder="latitud" value="{{isset($editdata) ? $editdata->latitud : ''}}"  maxlength="60">
    <label for="description">Coordenades inici caminada</label>
    <input type="text" name="longitud" id="longitud" class="form-control" placeholder="longitud" value="{{isset($editdata) ? $editdata->longitud : ''}}"  maxlength="60">
</div>
<div class="col-lg-12">
    <!--<label for="description">Sortida</label>
    <div class="col-lg-12">
        <label for="description">Nom</label>
        <input class="form-control" name="nom_sortida" type="text" value="{{isset($controls) ? $controls[0]->nom : ''}}" />
        <label for="description">Descripció</label>
        <input class="form-control" name="descripcio_sortida" type="text" value="{{isset($controls) ? $controls[0]->descripcio : ''}}" />
    </div>-->
    <div class="row">
        <label for="description">Sortida</label>
        <div class="col-lg-12">
            <label for="description">Nom</label>
            <input class="form-control" name="control[0][nom]" type="text" value="{{isset($editdata) ? $editdata->controls[0]->nom : ''}}" />
            <label for="description">Descripció</label>
            <textarea class="form-control" name="control[0][descripcio]" type="text" rows="8">{{isset($editdata) ? $editdata->controls[0]->descripcio : ''}}</textarea>
            <label for="description">Distancia recorreguda</label>
            <input class="form-control" name="control[0][distancia]" type="text" value="{{isset($editdata) ? $editdata->controls[0]->distancia : ''}}" />
            <label for="description">Coordenades control</label>
            <input type="text" name="control[0][latitud]" id="latitud" class="form-control" placeholder="42.1324256..." value="{{isset($editdata) ? $editdata->controls[0]->latitud : ''}}"  maxlength="60">
            <label for="description">Coordenades control</label>
            <input type="text" name="control[0][longitud]" id="longitud" class="form-control" placeholder="1.6641764..." value="{{isset($editdata) ? $editdata->controls[0]->longitud : ''}}"  maxlength="60">
        </div>
        <label for="description">Primer control</label>
        <div class="col-lg-12">
            <label for="description">Nom</label>
            <input class="form-control" name="control[1][nom]" type="text" value="{{isset($editdata) ? $editdata->controls[1]->nom : ''}}" />
            <label for="description">Descripció</label>
            <textarea class="form-control" name="control[1][descripcio]" type="text" rows="8">{{isset($editdata) ? $editdata->controls[1]->descripcio : ''}}</textarea>
            <label for="description">Distancia recorreguda</label>
            <input class="form-control" name="control[1][distancia]" type="text" value="{{isset($editdata) ? $editdata->controls[1]->distancia : ''}}" />
            <label for="description">Coordenades control</label>
            <input type="text" name="control[1][latitud]" id="latitud" class="form-control" placeholder="42.1324256..." value="{{isset($editdata) ? $editdata->controls[1]->latitud : ''}}"  maxlength="60">
            <label for="description">Coordenades control</label>
            <input type="text" name="control[1][longitud]" id="longitud" class="form-control" placeholder="1.6641764..." value="{{isset($editdata) ? $editdata->controls[1]->longitud : ''}}"  maxlength="60">
        </div>
        <label for="description">Segon control</label>
        <div class="col-lg-12">
            <label for="description">Nom</label>
            <input class="form-control" name="control[2][nom]" type="text" value="{{isset($editdata) ? $editdata->controls[2]->nom : ''}}" />
            <label for="description">Descripció</label>
            <textarea class="form-control" name="control[2][descripcio]" type="text" rows="8">{{isset($editdata) ? $editdata->controls[2]->descripcio : ''}}</textarea>
            <label for="description">Distancia recorreguda</label>
            <input class="form-control" name="control[2][distancia]" type="text" value="{{isset($editdata) ? $editdata->controls[2]->distancia : ''}}" />
            <label for="description">Coordenades control</label>
            <input type="text" name="control[2][latitud]" id="latitud" class="form-control" placeholder="42.1324256..." value="{{isset($editdata) ? $editdata->controls[2]->latitud : ''}}"  maxlength="60">
            <label for="description">Coordenades control</label>
            <input type="text" name="control[2][longitud]" id="longitud" class="form-control" placeholder="1.6641764..." value="{{isset($editdata) ? $editdata->controls[2]->longitud : ''}}"  maxlength="60">
        </div>
        <label for="description">Tercer control</label>
        <div class="col-lg-12">
            <label for="description">Nom</label>
            <input class="form-control" name="control[3][nom]" type="text" value="{{isset($editdata) ? $editdata->controls[3]->nom : ''}}" />
            <label for="description">Descripció</label>
            <textarea class="form-control" name="control[3][descripcio]" type="text" rows="8">{{isset($editdata) ? $editdata->controls[3]->descripcio : ''}}</textarea>
            <label for="description">Distancia recorreguda</label>
            <input class="form-control" name="control[3][distancia]" type="text" value="{{isset($editdata) ? $editdata->controls[3]->distancia : ''}}" />
            <label for="description">Coordenades control</label>
            <input type="text" name="control[3][latitud]" id="latitud" class="form-control" placeholder="42.1324256..." value="{{isset($editdata) ? $editdata->controls[3]->latitud : ''}}"  maxlength="60">
            <label for="description">Coordenades control</label>
            <input type="text" name="control[3][longitud]" id="longitud" class="form-control" placeholder="1.6641764..." value="{{isset($editdata) ? $editdata->controls[3]->longitud : ''}}"  maxlength="60">
        </div>
        <label for="description">Quart control</label>
        <div class="col-lg-12">
            <label for="description">Nom</label>
            <input class="form-control" name="control[4][nom]" type="text" value="{{isset($editdata) ? $editdata->controls[4]->nom : ''}}" />
            <label for="description">Descripció</label>
            <textarea class="form-control" name="control[4][descripcio]" type="text" rows="8">{{isset($editdata) ? $editdata->controls[4]->descripcio : ''}}</textarea>
            <label for="description">Distancia recorreguda</label>
            <input class="form-control" name="control[4][distancia]" type="text" value="{{isset($editdata) ? $editdata->controls[4]->distancia : ''}}" />
            <label for="description">Coordenades control</label>
            <input type="text" name="control[4][latitud]" id="latitud" class="form-control" placeholder="42.1324256..." value="{{isset($editdata) ? $editdata->controls[4]->latitud : ''}}"  maxlength="60">
            <label for="description">Coordenades control</label>
            <input type="text" name="control[4][longitud]" id="longitud" class="form-control" placeholder="1.6641764..." value="{{isset($editdata) ? $editdata->controls[4]->longitud : ''}}"  maxlength="60">
        </div>
        <label for="description">Arribada</label>
        <div class="col-lg-12">
            <label for="description">Nom</label>
            <input class="form-control" name="control[5][nom]" type="text" value="{{isset($editdata) ? $editdata->controls[5]->nom : ''}}" />
            <label for="description">Descripció</label>
            <textarea class="form-control" name="control[5][descripcio]" type="text" rows="8">{{isset($editdata) ? $editdata->controls[5]->descripcio : ''}}</textarea>
            <label for="description">Distancia recorreguda</label>
            <input class="form-control" name="control[5][distancia]" type="text" value="{{isset($editdata) ? $editdata->controls[5]->distancia : ''}}" />
            <label for="description">Coordenades control</label>
            <input type="text" name="control[5][latitud]" id="latitud" class="form-control" placeholder="42.1324256..." value="{{isset($editdata) ? $editdata->controls[5]->latitud : ''}}"  maxlength="60">
            <label for="description">Coordenades control</label>
            <input type="text" name="control[5][longitud]" id="longitud" class="form-control" placeholder="1.6641764..." value="{{isset($editdata) ? $editdata->controls[5]->longitud : ''}}"  maxlength="60">
        </div>
    </div>
    
    <div class="row" id="controls"></div>
    <!--<label for="description">Arribada</label>
    <div class="col-lg-12">

        <label for="description">Nom</label>
        <input class="form-control" name="nom_arribada" type="text"/>    
        <label for="description">Descripció</label>
        <input class="form-control" name="descripcio_arribada'" type="text"/>
        <label for="description">Distancia acumulada</label>
        <input class="form-control" name="distancia_acumulada_arribada'" type="text"/>
    </div>-->
</div>
<!-- TODO Borrar fotos no està operatiu-->
@if(!isset($editdata->imatges_id))
    <div class="col-lg-12">
        <label for="title">Imatge Portada</label>
        <input type="file" name="imatge" id="imatge" class="form-control" placeholder="Titol..." value="{{isset($editdata) ? $editdata->imatges_id : ''}}"  maxlength="30">
    </div>
@else
    <div class="col-lg-12">
        <label for="title">Imatge Portada</label>
        <img src="/{{$editdata->imatge}}" class="img-fluid" alt="">
        <a href="fitxer/borrar/{{$editdata->id}}/imatges_id" class="btn btn-danger col-sm" >
            <i class="bi bi-gear-wide"> Eliminar </i>
        </a>
    </div>
@endif
@if(!isset($editdata->altimetria_id))
    <div class="col-lg-12">
        <label for="title">Imatge Altimetria</label>
        <input type="file" name="altimetria" id="altimetria" class="form-control" placeholder="Titol..." value="{{isset($editdata) ? $editdata->altimetria_id : ''}}"  maxlength="30">
    </div>
@else
    <div class="col-lg-12">
        <label for="title">Imatge Altimetria</label>
        <img src="/{{$editdata->altimetria}}" class="img-fluid" alt="">
        
        <a href="fitxer/borrar/{{$editdata->id}}/altimetria_id" class="btn btn-danger col-sm" >
            <i class="bi bi-gear-wide"> Eliminar </i>
        </a>
    </div>
@endif
@if(!isset($editdata->mapa_id))
    <div class="col-lg-12">
        <label for="title">Imatge Mapa</label>
        <input type="file" name="mapa" id="mapa" class="form-control" placeholder="Titol..." value="{{isset($editdata) ? $editdata->mapa_id : ''}}"  maxlength="30">
    </div>
@else
    <div class="col-lg-12">
        <label for="title">Imatge Mapa</label>
        <img src="/{{$editdata->mapa}}" class="img-fluid" alt="">
        
        <a href="fitxer/borrar/{{$editdata->id}}/mapa_id" class="btn btn-danger col-sm" >
            <i class="bi bi-gear-wide"> Eliminar </i>
        </a>
    </div>
@endif
@if(!isset($editdata->track_id))
    <div class="col-lg-12">
        <label for="title">Track</label>
        <input type="file" name="track" id="track" class="form-control" placeholder="Titol..." value="{{isset($editdata) ? $editdata->track_id : ''}}"  maxlength="30">
    </div>
@else
    <div class="col-lg-12">
        <label for="title">Track</label>
        <img src="/{{$editdata->track}}" class="img-fluid" alt="">
        
        <a href="fitxer/borrar/{{$editdata->id}}/track_id" class="btn btn-danger col-sm" >
            <i class="bi bi-gear-wide"> Eliminar </i>
        </a>
    </div>
@endif
@if(!isset($editdata->triptic_id))
    <div class="col-lg-12">
        <label for="title">Triptic</label>
        <input type="file" name="triptic" id="triptic" class="form-control" placeholder="Titol..." value="{{isset($editdata) ? $editdata->triptic_id : ''}}"  maxlength="30">
    </div>
@else
    <div class="col-lg-12">
        <label for="title">Track</label>
        <img src="/{{$editdata->triptic}}" class="img-fluid" alt="">
        
        <a href="fitxer/borrar/{{$editdata->id}}/triptic_id" class="btn btn-danger col-sm" >
            <i class="bi bi-gear-wide"> Eliminar </i>
        </a>
    </div>
@endif
<!--<script>
a = -1;
function addControl(){
        a++;

        var div = document.createElement('div');
        div.setAttribute('class', 'form-inline');
        div.innerHTML = 
            '<label for="description">Control '+a+'</label>'+
            '<div class="col-lg-12">'+
                '<label for="description">Nom</label>'+
                '<input class="form-control" name="control['+a+'][nom]" type="text"/>'+
                '<label for="description">Descripcio</label>'+
                '<textarea class="form-control" name="control['+a+'][descripcio]" type="text"></textarea>'+
                '<label for="description">Distancia acumulada</label>'+
                '<input class="form-control" name="control['+a+'][distancia]" type="text"/>'+
                '<label for="description">Latitud</label>'+
                '<input class="form-control" name="control['+a+'][latitud]" type="text"/>'+
                '<label for="description">Longitud</label>'+
                '<input class="form-control" name="control['+a+'][longitud]" type="text"/>'+
            '</div>';
        document.getElementById('controls').appendChild(div);document.getElementById('controls').appendChild(div);
}
</script>-->
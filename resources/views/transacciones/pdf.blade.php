
    <br>
        <h1>LISTADO DE VENTAS</h1>
        <p>Filtros: categoria: {{$categoria[0]->nombre}} desde: {{$fecha1}} hasta: {{$fecha2}}</p>
    <br>

    <div style="text-align: center; ">
        <table style="width:50%; float:center;" class="table">
            <thead>
            <tr>
                <td><strong>ANUNCIO</strong></td>
                <td><strong>CATEGORIA</strong></td>
                <td><strong>FECHA</strong></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
                @foreach($trans as $tran)
                    @foreach($tran as $tra)
                        @foreach($tra as $tr)
                            <tr>                         
                                <td>{{$tr->anuncio->producto}}</td>   
                                <td>{{$tr->anuncio->categoria->nombre}}</td>  
                                <td>{{$tr->created_at->format('d/m/Y')}}</td>        
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

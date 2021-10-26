{{-- Mensajes de alerta de exito o error en peticiones --}}

@if (Session::has('message'))
    <div class="alert alert-{{Session::get('alert')}} my-3">
        <p>{{Session::get('message')}}</p>
    </div>
@endif

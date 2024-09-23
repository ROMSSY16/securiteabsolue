@extends('layouts.admin')

@push('css')
<link href="{{ asset('backend/src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
   
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">

            <!--  BEGIN BREADCRUMBS  -->
            @include('partials.__breadcrumbs')
            <!--  END BREADCRUMBS  -->
            
            <div class="row layout-top-spacing">
                        
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom & Prénom(s)</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Service</th>
                                    <th>Date d'enregistrement</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devis as $key => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex">                                                        
                                            <div class="usr-img-frame me-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('default_user.png') }}">
                                            </div>
                                            <p class="align-self-center mb-0 admin-name"> {{$item->fullname}} </p>
                                        </div>
                                    </td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email ?? null}}</td>
                                    <td>{{$item->service->name ?? null}}</td>
                                    <td>{{ $item->created_at->locale('fr')->translatedFormat('d M Y') }}</td>
                                    <td class="text-center">
                                        @if($item->status == 'Approuvé')
                                        <span class="shadow-none badge badge-success">Approuvé</span>
                                        @endif
                                        @if($item->status == 'En attente')
                                        <span class="shadow-none badge badge-primary">En attente</span>
                                        @endif
                                        @if($item->status == 'Non approuvé')
                                        <span class="shadow-none badge badge-danger">Non approuvé</span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editDevis{{$key}}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier" data-original-title="Modifier"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                        <a href="{{route('admin.devis.delete', $item->id)}}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" data-original-title="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#sendMailModal{{$key}}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Envoyer un email" data-original-title="Envoyer un email">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail p-1 br-8 mb-1"><path d="M4 4h16v16H4z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        </a>
                                    </td>
                                </tr>

                                {{-- Edit modal  --}}
                                <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="editDevis{{$key}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-top rotateInDownLeft modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title item-center" id="exampleModalLabel">Modifier le status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.devis.change.status', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="name" class="form-label">Status</label>
                                                                <select name="status" id="status" class="form-select" required>
                                                                    <option value="">--------Choisir -------</option>
                                                                    <option value="En attente" {{ "En attente" == $item->status ? 'selected' : '' }}>En attente</option>
                                                                    <option value="Approuvé" {{ "Approuvé" == $item->status ? 'selected' : '' }}>Approuvé</option>
                                                                    <option value="Non approuvé" {{ "Non approuvé" == $item->status ? 'selected' : '' }}>Non approuvé</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Veuillez selectionner le status.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">CHANGER</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Send Mail Modal -->
                                <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="sendMailModal{{$key}}" aria-labelledby="sendMailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-top rotateInDownLeft modal-xxl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sendMailModalLabel">Envoyer un email à {{$item->fullname}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.devis.send.mail', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="subject" class="form-label">Objet</label>
                                                        <input type="text" class="form-control" id="subject" name="subject" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message" class="form-label">Message</label>
                                                        <textarea class="form-control summernote" id="message" name="message" rows="4" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom & Prénom(s)</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Service</th>
                                    <th>Date d'enregistrement</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
   
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'description...',
            tabsize: 2,
            height: 300
        });
    </script>
<script src="{{ asset('backend/src/plugins/src/table/datatable/datatables.js') }}"></script>
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10 
    });
</script>
@endpush

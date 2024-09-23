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
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Objet</th>
                                    <th>Message</th>
                                    <th>Ajouté le </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $key => $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->address ?? null}}</td>
                                    <td>{{$item->phone ?? null}}</td>
                                    <td>{{$item->subject ?? null}}</td>
                                    <td>{{$item->message ?? null}}</td>
                                    <td>{{ $item->created_at->locale('fr')->translatedFormat('d M Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.contact.delete', $item->id)}}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" data-original-title="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#sendMailModal{{$key}}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Envoyer un email" data-original-title="Envoyer un email">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail p-1 br-8 mb-1"><path d="M4 4h16v16H4z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Send Mail Modal -->
                                <div class="modal z-index-1 fade" tabindex="-1" role="dialog" id="sendMailModal{{$key}}" aria-labelledby="sendMailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-top rotateInDownLeft modal-xxl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sendMailModalLabel">Envoyer un email à {{$item->fullname}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.send.mail', $item->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="address" value="{{$item->address}}">
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

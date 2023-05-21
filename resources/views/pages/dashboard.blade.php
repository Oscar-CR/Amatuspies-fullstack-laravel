@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

            
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Solicitudes</p>
                                    <h5 class="font-weight-bolder">
                                        {{$medical_appointment}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                        Total solicitudes
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-world-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Citas</p>
                                    <h5 class="font-weight-bolder">
                                        {{$dates}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                        Total de citas
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Citas de hoy</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $today_dates }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder"></span>
                                        Citas del dia
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Usuarios</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $users }}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder"></span> Usuarios activos
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 >Citas del día</h6>
                        <p class="text-sm mb-0">
                            @if ($today_dates >0)
                                <i class="fa fa-arrow-up text-success"></i>
                            @endif
                            <span class="font-weight-bold">{{ $today_dates }}</span> 
                        </p>
                    </div>
                    <div class="card-body p-3">

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Motivo</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tratamiento</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha y Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($today_dates_data as $medical_date )
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $medical_date->client_name }} </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $medical_date->motive_date }} </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $medical_date->treatment_type }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{  $medical_date->date}}</p>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card p-4">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>    
     
    </div>
@endsection

@push('js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>

    <script>
        let today_dates_data = @json($dates_data);

        console.log(today_dates_data);
        
        events = []
        today_dates_data.forEach(element => {
            events.push({
                title: element.client_name,
                start: element.date,
                description: element.treatment_type,
                rendering: 'background',
                editable: false,
                eventStartEditable: false,
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events,
            eventClick: function(event) {
                Swal.fire(
                    'The Internet?',
                    'That thing is still around?',
                    'question'
                )
            }
            });
            calendar.render();
        });


       
   
    </script>
@endpush

@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <section class="section">
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="font-15" style="color: black">Pengajuan Buka Tabungan</h5>
                            <div class="card-header-action" style="padding-left: 1.8rem">
                                <a href="{{ route('buka.tabungan.list') }}" class="btn btn-primary"> View </a>
                            </div>
                        </div>
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                                        <div class="card-content">
                                            <h2 class="mb-3 font-18 text-right" style="padding-right: 3rem">
                                                {{ $count_tabungan }}</h2>
                                            {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="font-15" style="color: black">Pengajuan Buka Deposito</h5>
                            <div class="card-header-action" style="padding-left: 1.8rem">
                                <a href="{{ route('buka.deposito.list') }}" class="btn btn-primary"> View </a>
                            </div>
                        </div>
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                                        <div class="card-content">
                                            <h2 class="mb-3 font-18 text-right" style="padding-right: 3rem">
                                                {{ $count_deposito }}</h2>
                                            {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="font-15" style="color: black">Pengajuan Pembiayaan</h5>
                            <div class="card-header-action" style="padding-left: 1.8rem">
                                <a href="{{ route('buka.kredit.list') }}" class="btn btn-primary"> View </a>
                            </div>
                        </div>
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                                        <div class="card-content">
                                            <h2 class="mb-3 font-18 text-right" style="padding-right: 3rem">
                                                {{ $count_kredit }}</h2>
                                            {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Pesan Masuk</h4>
                            <div class="card-header-action">
                                {{-- <div class="dropdown">
                                    <a href="#" data-toggle="dropdown"
                                        class="btn btn-warning dropdown-toggle">Options</a>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                        <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                            Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item has-icon text-danger"><i
                                                class="far fa-trash-alt"></i>
                                            Delete</a>
                                    </div>
                                </div> --}}
                                <a href="{{ route('kontak.list') }}" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" style="width:100%;">
                                    {{--  id="save-stage myTable" --}}
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 50px">No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Subjek</th>
                                            <th style="width: 250px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_kontak as $kontak)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ date('d/m/Y', strtotime($kontak->tanggal)) }}
                                                </td>
                                                <td>{{ $kontak->nama }}</td>
                                                <td>{{ $kontak->subjek }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('kontak.destroy', $kontak->id) }}" method="POST">
                                                        {{-- <button type="button"
                                                            class="show btn btn-sm btn-outline-info"
                                                            data-id="{{ $kontak->id }}"
                                                            data-nama="{{ $kontak->nama }}"
                                                            data-subjek="{{ $kontak->subjek }}">
                                                            <i data-feather="info"></i> Detail
                                                        </button> --}}
                                                        <a href="{{ route('kontak.detail', $kontak->id) }}"
                                                            class="btn btn-sm btn-outline-info">
                                                            <i data-feather="info"></i> Detail
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                data-feather="trash-2"></i> Hapus</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Pengunjung Situs</h4>
                            <div class="card-header-action">
                                {{-- <a href="{{ route('kontak.list') }}" class="btn btn-primary">View All</a> --}}
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <!-- Histats.com  (div with counter) -->
                            <div id="histats_counter"></div>
                            <!-- Histats.com  START  (aync)-->
                            <script type="text/javascript">
                                var _Hasync = _Hasync || [];
                                _Hasync.push(['Histats.start', '1,4724304,4,4006,112,61,00011110']);
                                _Hasync.push(['Histats.fasi', '1']);
                                _Hasync.push(['Histats.track_hits', '']);
                                (function() {
                                    var hs = document.createElement('script');
                                    hs.type = 'text/javascript';
                                    hs.async = true;
                                    hs.src = ('//s10.histats.com/js15_as.js');
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                                })();
                            </script>
                            <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4724304&101"
                                        alt="" border="0"></a></noscript>
                            <!-- Histats.com  END  -->
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-header">
                            <h4>Total Pengikut {{ $count_subscribe }} Akun</h4>
                            <div class="card-header-action">
                                <a href="{{ route('subscribe.list') }}" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        {{-- <div class="card-body text-center">
                            <h2 class="mb-3 font-18 text-right" style="padding-right: 3rem">
                                {{ $count_subscribe }}</h2>
                        </div> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover mb-0" style="width:100%;">
                                        {{--  id="save-stage myTable" --}}
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px">No</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_subscribe as $subscribe)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $subscribe->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart4" class="chartsh"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart</h4>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                                    <div id="chart3" class="chartsh"></div>
                                </div>
                                <div data-tab-group="summary-tab" id="summary-text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart2" class="chartsh"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Assign Task Table</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                    class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Task Name</th>
                                        <th>Members</th>
                                        <th>Task Status</th>
                                        <th>Assigh Date</th>
                                        <th>Due Date</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-8.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-9.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-10.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">50%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-success" data-width="50%"></div>
                                            </div>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>2019-05-28</td>
                                        <td>
                                            <div class="badge badge-success">Low</div>
                                        </td>
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-2">
                                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Redesign homepage</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-1.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-2.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">40%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-danger" data-width="40%"></div>
                                            </div>
                                        </td>
                                        <td>2017-07-14</td>
                                        <td>2018-07-21</td>
                                        <td>
                                            <div class="badge badge-danger">High</div>
                                        </td>
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-3">
                                                <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Backup database</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-3.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-4.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-5.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">55%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-purple" data-width="55%"></div>
                                            </div>
                                        </td>
                                        <td>2019-07-25</td>
                                        <td>2019-08-17</td>
                                        <td>
                                            <div class="badge badge-info">Average</div>
                                        </td>
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-4">
                                                <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Android App</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-7.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-8.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">70%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar" data-width="70%"></div>
                                            </div>
                                        </td>
                                        <td>2018-04-15</td>
                                        <td>2019-07-19</td>
                                        <td>
                                            <div class="badge badge-success">Low</div>
                                        </td>
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-5">
                                                <label for="checkbox-5" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Logo Design</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-9.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-10.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-2.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">45%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-cyan" data-width="45%"></div>
                                            </div>
                                        </td>
                                        <td>2017-02-24</td>
                                        <td>2018-09-06</td>
                                        <td>
                                            <div class="badge badge-danger">High</div>
                                        </td>
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-6">
                                                <label for="checkbox-6" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Ecommerce website</td>
                                        <td class="text-truncate">
                                            <ul class="list-unstyled order-list m-b-0 m-b-0">
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-8.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Wildan Ahdian"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-9.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="John Deo"></li>
                                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                                        src="{{ url('otika') }}/assets/img/users/user-10.png"
                                                        alt="user" data-toggle="tooltip" title=""
                                                        data-original-title="Sarah Smith"></li>
                                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-text">30%</div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-orange" data-width="30%"></div>
                                            </div>
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>2019-05-28</td>
                                        <td>
                                            <div class="badge badge-info">Average</div>
                                        </td>
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
@endsection

@extends('user.layout')
 
@section('notifikasi')
<div class="dropdown for-message">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-shopping-cart"></i>
        <span class="count bg-primary">{{$jumlahBelanja}}</span>
    </button>
</div>
    
@endsection

@section('konten')
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">  
        <div class="row">
            @if (session('error'))
                <script>
                    alert("{{session('error')}}");
                </script>
                <?php
                    Session::forget('error')
                ?>
            @elseif(session('success'))
                <script>
                    alert("{{session('success')}}");
                </script>
                <?php
                    Session::forget('success')
                ?>
            @endif
            
            <!-- Widgets Buah --> 
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Buah</h4>
                    </div>
                </div>
            </div>

            @foreach ($dataProduk as $dp)
                @if ($dp->kategori_produk == "buah")
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <img src="{{$dp -> gambar_produk}}" width="60" height="60">
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">RP. <span class="count">{{$dp -> harga_produk}}</span></div>
                                                @if ($dp->kuantitas_produk > 0)
                                                    <div class="stat-heading">{{$dp -> nama_produk}} <br> Sisa : {{$dp -> kuantitas_produk}}</div>
                                                    <a href="/keranjang/{{$dp -> id}}"><button type="button" class="btn btn-primary" style="margin-top:10px"><i class="fa fa-shopping-cart"> Tambah</i></button></a>
                                                @else
                                                    <div class="stat-heading">{{$dp -> nama_produk}} <br><strong> Stock Habis! </strong></div>
                                                @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif 
            @endforeach    
            <!-- End Widgets Buah -->  
            
            <!-- Widgets Daging --> 
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daging</h4>
                    </div>
                </div>
            </div>

            @foreach ($dataProduk as $dp)
                @if ($dp->kategori_produk == "daging")
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <img src="{{$dp -> gambar_produk}}" width="60" height="60">
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">RP. <span class="count">{{$dp -> harga_produk}}</span></div>
                                                @if ($dp->kuantitas_produk > 0)
                                                    <div class="stat-heading">{{$dp -> nama_produk}} <br> Sisa : {{$dp -> kuantitas_produk}}</div>
                                                    <a href="/keranjang/{{$dp -> id}}"><button type="button" class="btn btn-primary" style="margin-top:10px"><i class="fa fa-shopping-cart"> Tambah</i></button></a>
                                                @else
                                                    <div class="stat-heading">{{$dp -> nama_produk}} <br><strong> Stock Habis! </strong></div>
                                                @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                @endif
            @endforeach
            <!-- End Widgets Daging --> 
        </div>
        
        <!-- /Widgets -->
        
        <!-- Calender Chart Weather  -->
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="box-title">Chandler</h4> -->
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- Modal - Calendar - Add New Event -->
        <div class="modal fade none-border" id="event-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add New Event</strong></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#event-modal -->
        <!-- Modal - Calendar - Add Category -->
        <div class="modal fade none-border" id="add-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add a category </strong></h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="pink">Pink</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
@endsection
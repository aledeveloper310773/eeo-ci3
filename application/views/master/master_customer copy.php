<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Master Customer</h4>
                    <button class="btn btn-sm btn-add" onclick="add_data()"><i class="fa fa-plus"></i>
                        Add</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead class=" text-primary">
                                <th>
                                    No
                                </th>
                                <th>
                                    Kode Customer
                                </th>
                                <th>
                                    Nama Customer
                                </th>
                                <th>
                                    Nama Alias
                                </th>
                                <th>
                                    Alamat Customer
                                </th>
                                <th>
                                    No Telp
                                </th>
                                <th>
                                    NPWP
                                </th>
                                <th>
                                    Alamat NPWP
                                </th>
                                <th>
                                    Nama PIC
                                </th>
                                <th>
                                    No HP PIC
                                </th>
                                <th>
                                    Jabatan PIC
                                </th>
                                <th>
                                    Email PC
                                </th>
                                <th>
                                    UP Surat
                                </th>
                                <th>
                                    Jabatan UP Surat
                                </th>
                                <th>
                                    Email UP Surat
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="defaultModalLabel">Master Customer</h4>
            </div>
            <div class="modal-body">
                <form id="form">
                <div class="form-group">
                    <label for="norek" class="col-form-label">Kode Customer:</label>
                    <input type="text" class="form-control" id="recipient-name" name="kode_customer">
                    <input type="hidden" name="id">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Nama Customer:</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama_customer">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Nama Alias:</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama_alias">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Alamat Customer:</label>
                    <input type="text" class="form-control" id="recipient-name" name="alamat_customer">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">No.Telp:</label>
                    <input type="text" class="form-control" id="recipient-name" name="no_telp">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">NPWP:</label>
                    <input type="text" class="form-control" id="recipient-name" name="NPWP">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Alamat NPWP:</label>
                    <input type="text" class="form-control" id="recipient-name" name="alamat_NPWP">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Nama PIC:</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama_pic">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">No HP PIC:</label>
                    <input type="text" class="form-control" id="recipient-name" name="no_hp_pic">
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Email PIC:</label>
                    <input type="text" class="form-control" id="recipient-name" name="email_pic">
                </div>
                <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jabatan PIC:</label>
                        <select class="form-control select2" id="jabatan" name="id_jabatan">
                            <option value=""></option>
                            <?php foreach ($jabatan as $value) {
                                 echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
                            } ;?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">UP Surat</label>
                    <input type="text" class="form-control" id="recipient" name="up_surat">
                </div>
                <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jabatan UP Surat:</label>
                        <select class="form-control select2" id="jabatanupsurat" name="jabatan_up_surat">
                            <option value=""></option>
                            <?php foreach ($jabatan as $value) {
                                 echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
                            } ;?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="norek" class="col-form-label">Email UP Surat:</label>
                    <input type="text" class="form-control" id="recipient" name="email_up_surat">
                </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-save" onclick="save();">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
var table;
var save_method;
var sweet_loader = '<div class="sweet_loader"><div class="spinner-border text-primary"></div></div>';


function add_data() {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#modal').modal('show'); // show bootstrap modal when complete loaded  
    $('.modal-title').text('Add Customer'); // Set title to Bootstrap modal title

}

function edit_data(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    //Ajax Load data from ajax
    $.ajax({
        url: "<?php echo site_url('customer/getdata_byid/')?>" + id,
        type: "GET",
        dataType: "JSON",
        beforeSend: function() {
            Swal.fire({
                html: '<h5>Loading...</h5>',
                showConfirmButton: false,
                onRender: function() {
                    // there will only ever be one sweet alert open.
                    $('.swal2-content').prepend(sweet_loader);
                }
            });
        },
        success: function(data) {
            Swal.close();
            $('[name="id"]').val(data.id);
            $('[name="kode_customer"]').val(data.kode_customer);
            $('[name="nama_customer"]').val(data.nama_customer);
            $('[name="nama_alias"]').val(data.nama_alias);
            $('[name="alamat_customer"]').val(data.alamat_customer);
            $('[name="no_telp"]').val(data.no_telp);
            $('[name="NPWP"]').val(data.NPWP);
            $('[name="alamat_NPWP"]').val(data.alamat_NPWP);
            $('[name="nama_pic"]').val(data.nama_pic);
            $('[name="no_hp_pic"]').val(data.no_hp_pic);
            $('[name="email_pic"]').val(data.email_pic);
            $('#jabatan').val(data.id_jabatan).change();
            $('[name="up_surat"]').val(data.up_surat);                                                                                                                        
            $('#jabatanupsurat').val(data.jabatan_up_surat).change();
            $('[name="email_up_surat"]').val(data.email_up_surat);                                                                                                                        
            $('#modal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Update Customer'); // Set title to Bootstrap modal title

        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.close();
            Swal.fire('Error!', 'Error get data from ajax', 'error');

        }
    });

    return false;
}

function save() {
    var url;
    if (save_method == 'add') {
        url = "<?php echo site_url('customer/data_add')?>";
    } else {
        url = "<?php echo site_url('customer/data_update')?>/" + $('input[name="id"]').val();
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.isConfirmed) {
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    Swal.fire({
                        html: '<h5>Loading...</h5>',
                        showConfirmButton: false,
                        onRender: function() {
                            // there will only ever be one sweet alert open.
                            $('.swal2-content').prepend(sweet_loader);
                        }
                    });
                },
                success: function(data) {
                    Swal.close();
                    Swal.fire(
                        'Saved!',
                        'Your file has been saved.',
                        'success'
                    );

                    table.ajax.reload();
                    $('#modal').modal('hide');

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //alert('Error adding / update data');
                    Swal.close();
                    Swal.fire(
                        'Error!',
                        jqXHR.responseText,
                        'error'
                    )
                }
            });

            //location.reload(); // for reload a page
            return false;
        }
    })


}

function delete_data(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?php echo site_url('customer/data_delete/') ;?>" + id,
                type: "POST",
                dataType: "JSON",
                beforeSend: function() {
                    Swal.fire({
                        html: '<h5>Loading...</h5>',
                        showConfirmButton: false,
                        onRender: function() {
                            // there will only ever be one sweet alert open.
                            $('.swal2-content').prepend(sweet_loader);
                        }
                    });
                },
                success: function(data) {
                    Swal.close();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );


                    table.ajax.reload();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //alert('Error adding / update data');
                    Swal.fire(
                        'Error!',
                        jqXHR.responseText,
                        'error'
                    )
                }

            });
            //location.reload(); // for reload a page
            return false;
        }
    });
    return false;
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2({});
    //datatables
    table = $('#table').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('customer/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });

});
</script>
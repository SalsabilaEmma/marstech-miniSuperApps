
        $(document).ready(function() {
            $.ajax({
                type: "get",
                // url: "https://tunasarthabaru.co.id/assync/provinsi",
                url: "{{ route('provinsi') }}",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    let dataprov = '<option selected hidden value="">- Pilih Provinsi -</option>'
                    response.forEach(function(res) {
                        dataprov += '<option value="' + res.name + '" idProv="' + res.id +
                            '">' + res.name + '</option>';
                    });
                    $('#provinsi').html(dataprov);
                }
            });

            $('select[name=provinsi]').on('change', function() {
                var idProv_selected = $('option:selected', this).attr('idProv');
                $.ajax({
                    type: "get",
                    // url: "https://tunasarthabaru.co.id/assync/distrik",
                    url: "{{ route('distrik') }}",
                    data: 'id_provinsi=' + idProv_selected,
                    dataType: "JSON",
                    success: function(resDistrik) {
                        console.log(resDistrik);
                        let datadistrik =
                            '<option selected hidden value="">- Pilih Kota / Kabupaten -</option>'
                        resDistrik.forEach(function(res) {
                            datadistrik += '<option value="' + res.name +
                                '" idDistrik="' + res.id + '">' + res.name +
                                '</option>';
                        });
                        $('#distrik').html(datadistrik);
                    }
                });
            });

            $('select[name=kab_kota]').on('change', function() {
                var idDistrik_selected = $('option:selected', this).attr('idDistrik');
                // alert(idDistrik_selected);
                $.ajax({
                    type: "get",
                    // url: "https://tunasarthabaru.co.id/assync/kecamatan",
                url: "{{ route('kecamatan') }}",
                    data: 'id_kabupaten=' + idDistrik_selected,
                    dataType: "JSON",
                    success: function(resKec) {
                        console.log(resKec);
                        let datakec =
                            '<option selected hidden value="">- Pilih Kecamatan -</option>'
                        resKec.forEach(function(res) {
                            datakec += '<option value="' + res.name + '" idKec="' + res
                                .id + '">' + res.name + '</option>';
                        });
                        $('#kecamatan').html(datakec);
                    }
                });
            });

            $('select[name=kecamatan]').on('change', function() {
                var idKec_selected = $('option:selected', this).attr('idKec');
                // alert(idDistrik_selected);
                $.ajax({
                    type: "get",
                    // url: "https://tunasarthabaru.co.id/assync/desa",
                url: "{{ route('desa') }}",
                    data: 'id_kecamatan=' + idKec_selected,
                    dataType: "JSON",
                    success: function(resDesa) {
                        console.log(resDesa);
                        let datadesa =
                            '<option selected hidden value="">- Pilih Kelurahan / Desa -</option>'
                        resDesa.forEach(function(res) {
                            datadesa += '<option value="' + res.name + '" idDesa="' +
                                res.id + '">' + res.name + '</option>';
                        });
                        $('#desa').html(datadesa);
                    }
                });
            });

        });

// $(document).ready(function() {
//     $.ajax({
//         type: "post",
//         url: "{{ route('provinsi') }}",
//         // data: {
//         //     "_token": "{{ csrf_token() }}",
//         // },
//         dataType: "JSON",
//         success: function(response) {
//             console.log(response);
//             let dataprov = '<option selected hidden value="">- Pilih Provinsi -</option>'
//             response.forEach(function(res) {
//                 dataprov += '<option value="' + res.name + '" idProv="' + res.id +
//                     '">' + res.name + '</option>';
//             });
//             $('#provinsi').html(dataprov);
//         }
//     });

//     $('select[name=provinsi]').on('change', function() {
//         var idProv_selected = $('option:selected', this).attr('idProv');
//         $.ajax({
//             type: "post",
//             url: "{{ route('distrik') }}",
//             data: 'id_provinsi=' + idProv_selected,
//             dataType: "JSON",
//             success: function(resDistrik) {
//                 console.log(resDistrik);
//                 let datadistrik =
//                     '<option selected hidden value="">- Pilih Kota / Kabupaten -</option>'
//                 resDistrik.forEach(function(res) {
//                     datadistrik += '<option value="' + res.name +
//                         '" idDistrik="' + res.id + '">' + res.name +
//                         '</option>';
//                 });
//                 $('#distrik').html(datadistrik);
//             }
//         });
//     });

//     $('select[name=kab_kota]').on('change', function() {
//         var idDistrik_selected = $('option:selected', this).attr('idDistrik');
//         // alert(idDistrik_selected);
//         $.ajax({
//             type: "post",
//             url: "{{ route('kecamatan') }}",
//             data: 'id_kabupaten=' + idDistrik_selected,
//             dataType: "JSON",
//             success: function(resKec) {
//                 console.log(resKec);
//                 let datakec =
//                     '<option selected hidden value="">- Pilih Kecamatan -</option>'
//                 resKec.forEach(function(res) {
//                     datakec += '<option value="' + res.name + '" idKec="' + res
//                         .id + '">' + res.name + '</option>';
//                 });
//                 $('#kecamatan').html(datakec);
//             }
//         });
//     });

//     $('select[name=kecamatan]').on('change', function() {
//         var idKec_selected = $('option:selected', this).attr('idKec');
//         // alert(idDistrik_selected);
//         $.ajax({
//             type: "post",
//             url: "{{ route('desa') }}",
//             data: 'id_kecamatan=' + idKec_selected,
//             dataType: "JSON",
//             success: function(resDesa) {
//                 console.log(resDesa);
//                 let datadesa =
//                     '<option selected hidden value="">- Pilih Kelurahan / Desa -</option>'
//                 resDesa.forEach(function(res) {
//                     datadesa += '<option value="' + res.name + '" idDesa="' +
//                         res.id + '">' + res.name + '</option>';
//                 });
//                 $('#desa').html(datadesa);
//             }
//         });
//     });

// });

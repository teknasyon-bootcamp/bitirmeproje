<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{--<script src="{{asset('js/app.js')}}"></script>--}}


<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
{{--<script src="{{asset('dist/js/demo.js')}}"></script>--}}
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


<!-- Ion Slider -->
<script src="{{asset('plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!-- Bootstrap slider -->
<script src="{{asset('plugins/bootstrap-slider/bootstrap-slider.min.js')}}"></script>
<!-- Page specific script -->


<script>
    $(function () {


        //Date range picker
        $('#reservation').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY',
                separator: ' / '
            }
        })


    })

</script>


<script>
    $(function () {
        /* BOOTSTRAP SLIDER */
        $('.slider').bootstrapSlider()

        /* ION SLIDER */
        $('#range_1').ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: '$',
            prettify: false,
            hasGrid: true
        })
        $('#range_2').ionRangeSlider()

        $('#range_5').ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: ' mm',
            prettify: false,
            hasGrid: true
        })
        $('#range_6').ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            type: 'single',
            step: 1,
            postfix: '°',
            prettify: false,
            hasGrid: true
        })

        $('#range_4').ionRangeSlider({
            type: 'single',
            step: 100,
            postfix: ' light years',
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        })
        $('#range_3').ionRangeSlider({
            type: 'double',
            postfix: ' miles',
            step: 10000,
            from: 25000000,
            to: 35000000,
            onChange: function (obj) {
                var t = ''
                for (var prop in obj) {
                    t += prop + ': ' + obj[prop] + '\r\n'
                }
                $('#result').html(t)
            },
            onLoad: function (obj) {
                //
            }
        })
    })
</script>


<script>
    $(function () {
        $('.select2').select2()
    });
</script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    function showToast(type, message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            icon: type,
            title: message
        })
    }
</script>
<script>
    $(document).ready(function () {
        if (!['home', '/home'].includes(window.location.pathname)) return;
        const ctx = document.getElementById('lineChart').getContext('2d');
        const ctx2 = document.getElementById('lineChart2').getContext('2d');

        $.ajax({
            type: 'POST',
            url: '/payments/weekly-transactions',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                const options = {
                    type: 'line',
                    data: {
                        labels: data.days,
                        datasets: []
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            },
                            xAxes: [{
                                ticks: {
                                    autoSkip: true,
                                    maxTicksLimit: 20
                                },
                            }]
                        }
                    }
                };

                $.each(data.data, function (i) {
                    const color = getRandomColor()
                    options.data.datasets.push(
                        {
                            label: '₺ ' + i,
                            data: data.data[i],
                            backgroundColor: [
                                color
                            ],
                            borderColor: [
                                color
                            ],
                            borderWidth: 1
                        }
                    )
                });

                new Chart(ctx, options);
                new Chart(ctx2, options);


            },

            error:

                function (err) {
                    console.log(err)
                }

            ,
        });

    });

    function getRandomColor() {
        const o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + .2 + ')';

    }

    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


    $(function () {
        $('#provider-list').on('change', function (e) {
            const selectContainer = document.getElementById('second-payment-types-select');
            const allFields = document.getElementById('all-fields-seconds');
            selectContainer.innerHTML = '';
            allFields.innerHTML = '';

            const val = e.target.value
            if (!val) return

            $.ajax({
                url: "{{url('/providers/payment-types')}}",
                type: 'POST',
                data: {
                    providerKey: val,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response)
                    const container = document.getElementById('second-payment-types');
                    container.style.visibility = 'visible';

                    const pID = document.getElementById('provider_id')
                    pID.value = response.provider_id

                    $.each(response.paymentTypes, function (k, v) {
                        const opt = document.createElement('option');
                        opt.value = v.key;
                        opt.innerHTML = v.name;
                        selectContainer.appendChild(opt);
                    });

                    $.each(response.fields, function (k, v) {
                        const label = document.createElement('label');
                        label.innerHTML = v.label;

                        const input = document.createElement('input');
                        input.placeholder = v.label
                        input.type = 'text'
                        input.required = true
                        input.className = 'form-control'
                        input.name = v.name

                        allFields.append(label)
                        allFields.append(input)


                    });


                },
                error: function (err) {
                    console.log(err)
                }
            })
        })
    });

</script>

<script>
    function handleReportTypeSelected() {
        console.log('handleReportTypeSelected')
    }
</script>


</body>
</html>

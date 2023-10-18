   <div class="container-fluid">

       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

       </div>

       <!-- Content Row -->

       <div class="row">

           <div class="col-xl-12 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow">
                   <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-info">Layanan Pokja <?php foreach ($data_bagian as $dt) : echo $dt->nama_bagian;
                                                                                endforeach; ?></span></h6>
                   </div>

               </div>
           </div>
           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-primary shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-l font-weight-bold text-primary text-uppercase mb-1">
                                   Layanan Masuk</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $total = 0;
                                                                                    foreach ($datajumlahlayananpokja as $dt) : {
                                                                                            if ($dt->id_status_layanan <> '1f7e6gj') {
                                                                                                $total = $total + $dt->total;
                                                                                            }
                                                                                        }
                                                                                    endforeach;
                                                                                    echo $total;
                                                                                    ?></div>

                           </div>
                           <div class="col-auto">
                               <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-secondary shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                   Layanan Diajukan</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = 0;
                                                                                    foreach ($datajumlahlayananpokja as $dt) : {
                                                                                            if ($dt->nama_status_layanan == 'Diajukan') {
                                                                                                $data = $data + $dt->total;
                                                                                            }
                                                                                        }
                                                                                    endforeach;
                                                                                    echo $data;
                                                                                    ?></div>
                           </div>
                           <div class="col-auto">
                               <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-info shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                   Layanan Diperiksa
                               </div>
                               <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $data = 0;
                                                                                                foreach ($datajumlahlayananpokja as $dt) : {
                                                                                                        if ($dt->nama_status_layanan == 'Diperiksa') {
                                                                                                            $data = $data + $dt->total;
                                                                                                        }
                                                                                                    }

                                                                                                endforeach;
                                                                                                echo $data;
                                                                                                ?></div>

                                   </div>

                               </div>
                           </div>
                           <div class="col-auto">
                               <i class="fas fa-eye fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Pending Requests Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-warning shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                   Layanan Dikembalikan</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = 0;
                                                                                    foreach ($datajumlahlayananpokja as $dt) : {
                                                                                            if ($dt->nama_status_layanan == 'Dikembalikan') {
                                                                                                $data = $data + $dt->total;
                                                                                            }
                                                                                        }
                                                                                    endforeach;
                                                                                    echo $data;
                                                                                    ?></div>
                           </div>
                           <div class="col-auto">
                               <i class="fas fa-history fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="row">

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-dark shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                   Layanan Diproses</div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = 0;
                                                                                    foreach ($datajumlahlayananpokja as $dt) : {
                                                                                            if ($dt->nama_status_layanan == 'Diproses') {
                                                                                                $data = $data + $dt->total;
                                                                                            }
                                                                                        }

                                                                                    endforeach;
                                                                                    echo $data;
                                                                                    ?></div>
                           </div>
                           <div class="col-auto">
                               <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-success shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                   Layanan Selesai </div>
                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $data = 0;
                                                                                    foreach ($datajumlahlayananpokja as $dt) : {
                                                                                            if ($dt->nama_status_layanan == 'Selesai') {
                                                                                                $data = $data + $dt->total;
                                                                                            }
                                                                                        }

                                                                                    endforeach;
                                                                                    echo $data;
                                                                                    ?></div>

                           </div>
                           <div class="col-auto">
                               <i class="fas fa-check-square fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-bottom-danger shadow h-100 py-2">
                   <div class="card-body">
                       <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Layanan Ditolak
                               </div>
                               <div class="row no-gutters align-items-center">
                                   <div class="col-auto">
                                       <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $data = 0;
                                                                                                foreach ($datajumlahlayananpokja as $dt) : {
                                                                                                        if ($dt->nama_status_layanan == 'Ditolak') {
                                                                                                            $data = $data + $dt->total;
                                                                                                        }
                                                                                                    }

                                                                                                endforeach;
                                                                                                echo $data;
                                                                                                ?></div>
                                   </div>

                               </div>
                           </div>
                           <div class="col-auto">
                               <i class="fas fa-times fa-2x text-gray-300"></i>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Content Row -->

       <div class="row">

           <div class="col-xl-6 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow mb-4">
                   <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-info">Statistik Layanan</h6>
                   </div>
                   <div class="card-body">

                       <div id="apexLine"></div>
                   </div>
               </div>
           </div>
           <div class="col-xl-6 col-lg-7">

               <!-- Area Chart -->
               <div class="card shadow mb-4">
                   <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-info">Layanan PerBagian</h6>
                   </div>
                   <div class="card-body">
                       <?php $dtbagian = "[";
                        $dttotal = "[";
                        foreach ($databagian as $dt) {
                            $dtbagian .= "'$dt->nama_bagian',";
                            $datajumlah = $this->m_pokja->get_dttotallayananbg($dt->id_bagian)->row_array();
                            $dttotal .= "$datajumlah[total],";
                        }
                        $dtbagian .= "]";
                        $dttotal .= "]";
                        ?>
                       <?php $databulan = "[";
                        $d = strtotime("-3 Month");
                        $databulan .= '"' . date("M - Y", $d) . '",';
                        $d = strtotime("-2 Month");
                        $databulan .= '"' . date("M - Y", $d) . '",';
                        $d = strtotime("-1 Month");
                        $databulan .= '"' . date("M - Y", $d) . '",' . '"' . date("M - Y") . '"]'; ?>

                       <div id="apexChart"></div>
                   </div>
               </div>
           </div>

       </div>
   </div>


   <script>
       var colors = {
           primary: "#F38181",
           secondary: "#FCE38A",
           success: "#EAFFD0",
           info: "#95E1D3",
           warning: "#F7A4A4",
           danger: "#FEBE8C",
           light: "#FFFBC1",
           dark: "#B6E2A1",
           muted: "#DBE2EF",
           gridBorder: "rgba(77, 138, 240, .15)",
           bodyColor: "#000",
           cardBg: "#fff"
       }

       var fontFamily = "'Roboto', Helvetica, sans-serif"


       // Apex Line chart start
       if ($('#apexLine').length) {
           var lineChartOptions = {
               chart: {
                   type: "line",
                   height: '420',
                   parentHeightOffset: 0,
                   foreColor: colors.bodyColor,
                   background: colors.cardBg,
                   toolbar: {
                       show: false
                   },
               },
               theme: {
                   mode: 'light'
               },
               tooltip: {
                   theme: 'light'
               },
               colors: [colors.secondary, colors.dark, colors.primary],
               grid: {
                   padding: {
                       bottom: -4
                   },
                   borderColor: colors.gridBorder,
                   xaxis: {
                       lines: {
                           show: true
                       }
                   }
               },
               series: [{
                       name: "Layanan Masuk",
                       data: <?= $datamasukttl; ?>
                   },
                   {
                       name: "Layanan Selesai",
                       data: <?= $dataselesaittl; ?>
                   },
                   {
                       name: "Layanan Ditolak",
                       data: <?= $datatolakttl; ?>
                   }
               ],
               xaxis: {

                   categories: <?php echo $databulan; ?>,
                   lines: {
                       show: true
                   },
                   axisBorder: {
                       color: colors.gridBorder,
                   },
                   axisTicks: {
                       color: colors.gridBorder,
                   },
               },
               markers: {
                   size: 0,
               },
               legend: {
                   show: true,
                   position: "top",
                   horizontalAlign: 'center',
                   fontFamily: fontFamily,
                   itemMargin: {
                       horizontal: 4,
                       vertical: 0
                   },
               },
               stroke: {
                   width: 3,
                   curve: "smooth",
                   lineCap: "round"
               },
           };
           var apexLineChart = new ApexCharts(document.querySelector("#apexLine"), lineChartOptions);
           apexLineChart.render();
       }

       if ($('#apexChart').length) {
           var options = {
               series: [{
                   data: <?= $dttotal; ?>
               }],
               chart: {
                   type: 'bar',
                   height: 400,
                   foreColor: colors.bodyColor,
                   background: colors.cardBg,
                   toolbar: {
                       show: false
                   },
               },
               plotOptions: {
                   bar: {
                       barHeight: '100%',
                       distributed: true,
                       horizontal: true,
                       dataLabels: {
                           position: 'bottom'
                       },
                   }
               },
               colors: [colors.primary, colors.secondary, colors.success, colors.info, colors.warning, colors.danger, colors.dark],

               dataLabels: {
                   enabled: true,
                   textAnchor: 'start',
                   style: {
                       colors: ['#000']
                   },
                   formatter: function(val, opt) {
                       return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                   },
                   offsetX: 0,
               },
               stroke: {
                   width: 1,
                   colors: ['#fff']
               },
               xaxis: {
                   categories: <?= $dtbagian; ?>,

               },
               yaxis: {
                   labels: {
                       show: false
                   }
               },
               theme: {
                   mode: 'light'
               },

               tooltip: {
                   theme: 'light',
                   x: {
                       show: false
                   },
                   y: {
                       title: {
                           formatter: function() {
                               return ''
                           }
                       }
                   }
               }
           };

           var chart = new ApexCharts(document.querySelector("#apexChart"), options);
           chart.render();
       }
   </script>
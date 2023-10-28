<?php $__env->startSection('header_title',__('admin.dashboard')); ?>
<?php $__env->startSection('content'); ?>


    <section id="advertisers" class="advertisers-service-sec pt-5 pb-5">
        <div class="container">
            <div class="row mt-5 mt-md-4 row-cols-1 row-cols-sm-1 row-cols-md-3 justify-content-center">
                <div class="col-md-3">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-list fa-2x"></i>
                        </div>
                        <h3>الاقسام</h3>
                        <p>
                         <?php echo e($categoriesCount); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                        <h3>المستخدمين</h3>
                        <p>
                          <?php echo e($usersCount); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-box-open fa-2x"></i>
                        </div>
                        <h3>المنتجات</h3>
                        <p>
                         <?php echo e($productsCount); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-chart-line fa-2x"></i>
                        </div>
                        <h3>الطلبات</h3>
                        <p>
                            <?php echo e($ordersCount); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ADVERTISERS SERVICE CARD ENDED -->

    <section id="advertisers" class="advertisers-service-sec pt-5 pb-5">
        <div class="container">
            <div class="row mt-5 mt-md-4 row-cols-1 row-cols-sm-1 row-cols-md-3 justify-content-center">
                <div class="col-md-6">
                    <div class="service-card">
                        <div id="chart_div"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-card">
                        <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ADVERTISERS SERVICE CARD ENDED -->

    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Websites', 3],
                ['Hosting', 1],
                ['Design', 1],
                ['Develop', 1],
                ['Front', 2]
            ]);

            // Set chart options
            var options = {'title':'إحصائيات المبيعات الاقسام',
                'width':'99%!important',
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }





    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/home/index.blade.php ENDPATH**/ ?>
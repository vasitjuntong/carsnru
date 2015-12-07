<div id="PR" class="page">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">ข่าวประชาสัมพันธ์</h2>
                    <!--                    <h3 class="title-description">We’re currently accepting new client projects. We look forward to serving you.</h3>-->
                </div>
            </div>
        </div>
        <!-- End Title Page -->

        <!-- Start BlockQuote/Tooltip Section -->
        <div class="row">
            <!-- Start Blockquote -->
            <?php
            $dataProviderPr = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'order' => 't.update_at desc',
                ),
            ));

            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProviderPr,
                'itemView' => '//layouts/_list_pr', // refers to the partial view named '_post' 
                'summaryText' => false,
//                'sortableAttributes' => array(
//                    'title',
//                    'create_time' => 'Post Time',
//                ),
            ));
            ?>
            <!-- Start Tooltip --><!-- End Tootlip -->
        </div>
        <!-- End BlockQuote/Tooltip Section -->
    </div>
</div>
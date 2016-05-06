<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 1,
            'date' => '2016-02-28',
            'title' => 'First day',
            'story' => 'First day towards my goal!',
            'points' => 1,
            'list_id' => 1,
            'user_id' => 1
        ]);
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 2,
            'date' => '2014-03-02',
            'title' => 'Gym',
            'story' => 'Went to a local gym and signed up for membership',
            'points' => 1,
            'list_id' => 1,
            'user_id' => 1
        ]);
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 1,
            'date' => '2014-03-04',
            'title' => 'Party',
            'story' => 'Attended a party and drank 10 bottles of Budlight...',
            'points' => -1,
            'list_id' => 1,
            'user_id' => 1
        ]);
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 2,
            'date' => '2016-04-15',
            'title' => 'Clean up',
            'story' => 'Nick cleaned up this bedroom without asking him to do so.',
            'points' => 2,
            'list_id' => 2,
            'user_id' => 1
        ]);
        DB::table('entries')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'entry' => 3,
            'date' => '2016-04-20',
            'title' => 'Fight',
            'story' => 'Nick had a fight with Mark at school, got called into Principal office',
            'points' => -5,
            'list_id' => 2,
            'user_id' => 1
        ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 1, 'date' => '2013-09-27', 'title' => '遇见', 'story' => '我们第一次眼神触碰在一起', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 2, 'date' => '2013-10-01', 'title' => '第一次约会', 'story' => '熊熊第一次约宝宝出去逛商场吃饭，这是我们第二次见面，宝宝才知道你真的有一米八。宝宝第一次吃北海道，只吃了几根乌冬面，熊熊吃的好腼腆，嘴里有东西都不讲话的！', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 3, 'date' => '2013-11-01', 'title' => '第一次万圣节', 'story' => '万圣节，我们第一次一起过夜，起来一起去fatbao吃早餐，然后回来休息，那天我们第一次粘在一起超过24小时，好开心。', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 4, 'date' => '2013-11-05', 'title' => '爱爱', 'story' => '那天熊熊装病，骗宝宝去看你，我们第一次接吻，第一次爱爱，熊熊冲过来吻宝宝，宝宝好心动', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 5, 'date' => '2013-11-25', 'title' => 'Thanksgiving', 'story' => 'Thanksgiving,熊熊前女友来找熊熊，还住在一起', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 6, 'date' => '2013-12-10', 'title' => ' 第一次告白', 'story' => '熊熊第一次告白失败，有点可怜，但是宝宝不能答应你，因为那时候，宝宝不是你的唯一', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 7, 'date' => '2013-12-25', 'title' => 'Christmas', 'story' => 'Christmas，熊熊和宝宝都在纽约，可是熊熊有人陪，宝宝好难过', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 8, 'date' => '2013-12-31', 'title' => '新年', 'story' => '过新年，熊熊请宝宝爸爸妈咪吃新年晚餐，熊熊算小费算了好久好久，我们一起看烟火，熊熊答应宝宝，2014年都会陪在宝宝身边，那一年是2013到14', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 9, 'date' => '2014-01-06', 'title' => '熊熊生日', 'story' => '熊熊生日，宝宝早晨5点就起来给熊熊送光盘，那天好冷，宝宝晕晕开到熊熊家，好想要进去看看熊熊，可是想要熊熊起来看到惊喜，放下光盘就走了，下午两点又跑去给熊熊装壁灯，一颗一颗粘了4个小时，熊熊下班接宝宝去吃日餐，还有一个会变宝宝照片的水杯，回家以后给熊熊惊喜，看起来熊熊有被吓到', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 10, 'date' => '2014-01-14', 'title' => '异地', 'story' => '宝宝搬去达拉斯上学，我们只有周末会见到，每次要回去，熊熊都会带宝宝去那家日料，吃奶酪乌冬面，和肥肥的kingsalmon', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 11, 'date' => '2014-02-14', 'title' => '情人节', 'story' => '熊熊来达拉斯和宝宝过节，可是宝宝在生病，本来计划好多惊喜给熊熊，可是累到只能爬在床上，宝宝给熊熊编了一首歌，可是到现在都没有唱给熊熊听，宝宝总觉得不满意，熊熊送宝宝项链，宝宝好喜欢，一只钥匙和一只锁，只有熊熊能开启宝宝的爱情，只有宝宝能走进熊熊心里', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 12, 'date' => '2014-02-28', 'title' => '表白', 'story' => '熊熊表白，宝宝好感动，我们的恋爱开始了', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 13, 'date' => '2014-03-01', 'title' => '迪士尼', 'story' => '我们的迪士尼，熊熊好用心的安排，可是输给了corndog~', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 14, 'date' => '2014-06-04', 'title' => '宝宝生日', 'story' => '宝宝生日，熊熊爸妈来休斯顿了，和宝宝一起过的生日，熊熊怕宝宝过的不开心，晚上还给宝宝唱最爱的歌，熊熊送宝宝钢琴，宝宝每次看到钢琴都觉得好幸福', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 15, 'date' => '2014-08-25', 'title' => '转学回休斯顿', 'story' => '宝宝转回休斯顿上学，我们又在一起啦', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 16, 'date' => '2014-09-01', 'title' => '半年纪念日', 'story' => '我们在一起半年了，熊熊带宝宝出去玩，去吃海鲜餐厅', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 17, 'date' => '2014-09-14', 'title' => '电影票', 'story' => '宝宝收到一封信，是熊熊预定的电影票，熊熊想要和宝宝去看电影', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 18, 'date' => '2014-09-22', 'title' => '怀孕', 'story' => '熊熊知道宝宝怀孕了，我们好开心，也好难过', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 19, 'date' => '2014-09-23', 'title' => '手术', 'story' => '宝宝去做手术，好难受，熊熊用心照顾宝宝，', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 20, 'date' => '2014-09-27', 'title' => '相遇一年', 'story' => '我们相遇一年，去k100唱歌吃晚餐，只有我们两个人，宝宝说爱上秋天，因为遇见熊熊', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 21, 'date' => '2014-11-10', 'title' => 'Halloween', 'story' => '又是一年万圣节，我们还是去的夜店，宝宝穿成好性感的小豹子，熊熊好爱好兴奋，宝宝也是～', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 22, 'date' => '2014-12-25', 'title' => '圣诞节', 'story' => '我们又要去迪士尼了，回到我们的迪士尼', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 23, 'date' => '2015-01-04', 'title' => '搬家', 'story' => '这是我们第一个小窝，我们两个人的东西好多好多，我们收拾好几天，一起去买家具', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 24, 'date' => '2015-01-06', 'title' => '熊熊生日', 'story' => '陪熊熊度过的第二个生日，刚搬好家，宝宝在上课，没办法像第一次一样给熊熊惊喜，不过还是吹了了好多气球，还有蛋糕，还有宝宝曾经第一次给熊熊做的清蒸玫瑰鱼，还有iPhone6Plus', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 25, 'date' => '2015-02-14', 'title' => '情人节', 'story' => '熊熊带宝宝出去玩儿，给宝宝爱心汤勺和鲜花被宝宝提前一天发现', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 26, 'date' => '2015-06-04', 'title' => '宝宝生日', 'story' => '宝宝突然发现熊熊写的纸条，熊熊又要带宝宝出去玩儿哇！芝加哥三天的生日旅行，去补上宝宝没有和熊熊在一起的日子', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 27, 'date' => '2015-07-22', 'title' => '熊熊回台湾', 'story' => '熊熊把宝宝一个人留下回台湾当兵了，宝宝好难过，后面的一年宝宝要一个人面对了', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 28, 'date' => '2015-08-01', 'title' => '宝宝路过台北', 'story' => '宝宝回北京，路过台北，见到熊熊，只有9个小时', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 29, 'date' => '2015-08-12', 'title' => '熊熊来北京', 'story' => '熊熊在北京陪宝宝玩儿了七天，吃了三只肥烤鸭', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 30, 'date' => '2015-09-01', 'title' => '宝宝专属号码', 'story' => '熊熊给宝宝小惊喜，用鲜花告诉宝宝专属号码，熊熊说，宝宝可以随时随地找到熊熊', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 31, 'date' => '2015-10-11', 'title' => '宝宝去台湾看熊熊', 'story' => '宝宝旷课一周去找熊熊玩，吃好多好多好吃的，熊熊带宝宝到处玩，到处吃，宝宝变圆嘟嘟，熊熊超爱，可是熊熊又败给了炸鲜奶', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 32, 'date' => '2015-10-16', 'title' => '宝宝伤心', 'story' => '宝宝知道熊熊有骗宝宝，好难过，好绝望,我们差一点分手', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 33, 'date' => '2015-10-29', 'title' => '熊熊入营', 'story' => '今天正式开始了一年的倒计时，感觉已经过去了一年那么久，可是这才刚刚开始', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 34, 'date' => '2015-11-10', 'title' => '万圣节', 'story' => '宝宝自己在家过，怕熊熊担心', 'points' => 0, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 35, 'date' => '2015-11-25', 'title' => '感恩节', 'story' => '我们不能一起过', 'points' => 0, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 36, 'date' => '2015-11-29', 'title' => '兵役满月', 'story' => '熊熊度过了兵营的第一个月，我们少了一个月的等待，宝宝却发现比想象中的更想你，后面的11个月不知道要怎样度过', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 37, 'date' => '2015-12-25', 'title' => '圣诞节', 'story' => '收到熊熊的惊喜，好多可乐，好多熊熊的爱', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 38, 'date' => '2015-12-29', 'title' => '兵营两个月', 'story' => '我们还有10个月', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 39, 'date' => '2016-01-06', 'title' => '熊熊生日', 'story' => '宝宝和熊熊在在一起的第三个生日，熊熊收到宝宝相框，里面装着我们的幸福，送去给熊熊的衣服也到了，熊熊不会冷哇，就像宝宝抱抱一样', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 40, 'date' => '2016-01-27', 'title' => '熊熊休假', 'story' => '熊熊回台北，宝宝好紧张，我们的关系变得很脆弱，宝宝不想要这样，却又不知道该怎么', 'points' => -1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 41, 'date' => '2016-01-29', 'title' => '兵营三个月', 'story' => '我们还有9个月', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 42, 'date' => '2016-02-02', 'title' => '宝宝闹脾气', 'story' => '熊熊没有提醒宝宝吃药，也没有删掉女生的联系，宝宝好紧张，发了好大的脾气，说了分手，熊熊用了条件卡', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 43, 'date' => '2016-02-04', 'title' => '爱情账户', 'story' => '今天建立了我们的爱情账户，宝宝希望这个账户可以一直写下去，记录我们一点一点的开心和不开心，我们可以看到都为了什么事情吵架，也可以记住那些幸福的瞬间，熊熊也要和宝宝一起记录我们的爱情，等我们老成丑八怪，可以看着这些幸福的小事情一起笑掉大牙', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 44, 'date' => '2016-02-09', 'title' => '睡不好', 'story' => '今天寶寶講白雪公主讓我睡得跟小豬一樣', 'points' => 1, 'color' => '#4682B4', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 45, 'date' => '2016-02-14', 'title' => '情人节', 'story' => '熊熊给宝宝过了好几天情人节，虽然不能在一起，宝宝还是很幸福，但是什么都没有可以在熊熊身边开心，爱熊熊', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 46, 'date' => '2016-03-19', 'title' => '寶寶來台灣', 'story' => '過了5個多月終於又看到寶寶了!!', 'points' => 1, 'color' => '#4682B4', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 47, 'date' => '2016-03-19', 'title' => '宝宝去看熊熊', 'story' => '终于见到熊熊～好想好想好想猪熊熊！！你变好瘦！肚肚有小鸡喽哇！！宝宝有爬在肚肚上吃炸小鸡，好开心好开心！', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 48, 'date' => '2016-03-19', 'title' => '雞屁股', 'story' => '雞屁股雞屁股雞屁股雞屁股雞屁股雞屁股雞屁股雞屁股', 'points' => 0, 'color' => '#4682B4', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 49, 'date' => '2016-03-21', 'title' => '泡菜Pizza', 'story' => '和熊熊去吃熊熊爱的蒙古烤肉，明明就是涮火锅加铁板烧，不过熊熊爱，宝宝也要喜欢，等熊熊当完兵，带熊熊去大草原，吃真正的蒙古烤肉，熊熊会吃成小猪嘟嘟！！', 'points' => 1, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 50, 'date' => '2016-03-24', 'title' => '泡溫泉', 'story' => '寶寶第一去專門泡私人溫泉的湯屋', 'points' => 1, 'color' => '#4682B4', 'list_id' => 3, 'user_id' => 3, ]);
        DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 51, 'date' => '2016-03-26', 'title' => '寶寶走了', 'story' => '一個禮拜怎麼會這麼快（宝宝走掉还＋1！！！熊熊希望宝宝走掉！！！）哼！！！', 'points' => 1, 'color' => '#4682B4', 'list_id' => 3, 'user_id' => 3, ]);
DB::table('entries')->insert([ 'created_at' => Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => Carbon\Carbon::now()->toDateTimeString(), 'entry' => 52, 'date' => '2016-03-27', 'title' => '宝宝回美国', 'story' => '宝宝回来大农村，熊熊也回去蹲监狱，我们又要分开好久，真难过，但是这次熊熊没有让宝宝难过，还把宝宝喂的圆圆，宝宝爱熊熊！！熊熊这次败给了鸡屁股。我们还要在坚持半年，还好已经过去了三分之二了，等熊熊回来，我们就只剩在一起在一起在一起！！！以后便便也要在一起！！呱呱！！', 'points' => 0, 'color' => '#8A2BE2', 'list_id' => 3, 'user_id' => 3, ]);


    }
}

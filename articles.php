<?php
/**
* 归档
*
* @package custom
*/

$this->need('header.php'); ?>
        <h1 class="post-title" itemprop="name headline">
            <?php $this->title() ?>
        </h1>
    <div class="post-content" itemprop="articleBody">
            <ul>
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 m 月')->to($archives); ?>
                <?php while ($archives->next()) : ?>
                
                    <li class="archives-item">
                        <div class="archives-item-content">
                            <h3 class="archives-item-title"><a href="<?php $archives->permalink(); ?>"><?php $archives->date(); ?></a></h3>
                            <?php
                            $year = $archives->year;
                            $month = $archives->month;
                            $nextYear = $month == 12 ? $year + 1 : $year;
                            $nextMonth = $month == 12 ? 1 : $month + 1;
                            $contents = $this->db->fetchAll($this->select()
                                ->where('table.contents.status = ?', 'publish')
                                ->where('table.contents.created >= ?', strtotime("$year-$month"))
                                ->where('table.contents.created < ?', strtotime("$nextYear-$nextMonth"))
                                ->where('table.contents.type = ?', 'post')
                                ->order('table.contents.created', Typecho_Db::SORT_DESC), array($this, 'push'));
                            //var_dump($contents);
                            foreach ($contents as $content) {
                                $this->widget('Widget_Archive@post-' . $content['cid'], 'pageSize=1&type=post', 'cid=' . $content['cid'])->to($postItem);
                                $title = htmlspecialchars($postItem->title, ENT_QUOTES, 'UTF-8');
                                $archiveDate = date('m/d', $content['created']);
                                echo "<p><span class='archives-time'>{$archiveDate}</span> <a href='{$postItem->permalink}' title='{$title}'>{$title}</a></p>";
                            }
                            ?>
    
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
<?php $this->need('footer.php'); ?>

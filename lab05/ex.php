<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Page {
        private $page;
        private $title;
        private $year;
        private $copyright;
        private $content;
        function __construct($title, $year, $content, $copyright) {
            $this->title = $title;
            $this->year = $year;
            $this->content = $content;
            $this->copyright = $copyright;
        }
        private function addHeader() {
            $header = '<div> ' . $this->title . ' </div><hr><hr>';
            $this->page .= $header;
        }
        public function addContent($content) {
            $this->addHeader();
            $bodyContent = '<div> ' . $content . ' </div>';
            $this->page .= $bodyContent;
            $this->addFooter();
        }
        private function addFooter() {
            $footer = '<hr><hr><div class="footer">
                    <div> Copyright: ' . $this->copyright . ' - ' . $this->year . '</div>
                    </div>
                    ';
            $this->page .= $footer;
        }
        public function get() {
            return ($this->page);
        }
    }
    ?>
    <div>
        <?php
        if (array_key_exists("start", $_POST)) {
            $title = $_POST["title"];
            $copyright = $_POST["copyright"];
            $year = $_POST["year"];
            $content = $_POST["content"];
        } else {
            $title = '';
            $copyright = '';
            $year = '';
            $content = '';
        }
        ?>
        <form action="" method="post">
            <div>
                <div>
                    <label>Page's title</label>
                    <input type="text" name="title" required />
                </div>
                <div>
                    <label>Copyright information:</label>
                    <input type="text" name="copyright" required value="" />
                </div>
                <div>
                    <label>Publicized year</label>
                    <input type="number" name="year" required value="" />
                </div>
                <div>
                    <label>Page's content</label>
                    <textarea type="text" name="content" required></textarea>
                    <div>
                        <input type="submit" name="start" value="Submit" />
                        <input type="reset" value="Reset" />
                    </div>
                </div>

            </div>
        </form>
        <div>
            <?php
            $page = new Page($title, $year, $content, $copyright);
            $page->addContent($content);
            echo $page->get();
            ?>
        </div>
    </div>
</body>
</html>

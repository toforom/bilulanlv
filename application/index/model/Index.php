<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Index extends Model
{
	public function alllist(){
//		$result = Db::field('id,title,add_time,acco,n_type,content,flag,num_comments')
//		  ->table('blog_diary')
//		  ->union('SELECT id,title,add_time,acco,n_type,content,flag,num_comments FROM blog_diary where acco = 1')
//	      ->union('SELECT id,title,add_time,acco,n_type,content,flag,num_comments FROM blog_article where acco = 1 order by add_time desc limit 0,10')
//		  ->select();
		//$result = Db::name('diary')->order('id', 'desc') -> paginate(10);
		$result = Db::query("select id,title,add_time,acco,n_type,content,flag,num_comments from blog_diary where acco=1 union all select id,title,add_time,acco,n_type,content,flag,num_comments from blog_article where acco=1 order by add_time desc limit 0,10");
		return $result;
	}
}

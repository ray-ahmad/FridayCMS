<?php

    defined("BASEPATH") or exit("No direct script access allowed!");

    class Post_model extends CI_Model {

        public function get_post($sef, $active = "Y") {
            return $this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
                            ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
                            ->join("user AS u", "`u`.`id` = `p`.`user_id`")
                            ->where(array("p.sef_url" => $sef, "p.active" => $active))
                            ->get("posts p");
        }

        public function get_all_posts($order = "DESC", $active = "Y", $where = NULL, $limit = 0, $offset = 0) {
            $this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
                     ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
                     ->join("user AS u", "`u`.`id` = `p`.`user_id`")
                     ->order_by("p.id", $order)
                     ->where("p.active", $active);

            if ($limit != 0)
                $this->db->limit($limit, $offset);

            if ($where !== NULL)
                $this->db->where($where);

            return $this->db->get("posts p");
        }

        public function count_all_posts($active = "Y", $where = NULL) {
            return $this->get_all_posts("DESC", $active, $where)->num_rows();
        }

        public function get_all_hot_posts($limit = 0, $offset = 0, $order = "DESC") {
            $this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
                     ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
                     ->join("user AS u", "`u`.`id` = `p`.`user_id`")
                     ->order_by("p.id", $order)
                     ->where(array("p.active" => "Y", "p.hot_post" => "Y"));

            if ($limit != 0)
                $this->db->limit($limit, $offset);

            return $this->db->get("posts p");
        }

        public function get_all_popular_posts($limit = 0, $offset = 0) {
            $this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
                     ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
                     ->join("user AS u", "`u`.`id` = `p`.`user_id`")
                     ->order_by("p.hits", "DESC")
                     ->where("p.active", "Y");

            if ($limit != 0)
                $this->db->limit($limit, $offset);

            return $this->db->get("posts p");
        }

        public function update_hits($id, $hits_now) {
            $hits_now = $hits_now + 1;
            return $this->db->where("id", $id)
                            ->update("posts", array("hits" => $hits_now));
            //alternative query -> return $this->db->query("UPDATE " . DB_PREFIX . "posts SET hits = hits+1 WHERE id='{$id}'");
        }
    }

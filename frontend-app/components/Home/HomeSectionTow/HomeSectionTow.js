"use client"

import PostsInLeft from "./PostsInLeft/PostsInLeft";

import './HomeSectionTow.css';
import MainPostInSectionTow from "./MainPostInSectionTow/MainPostInSectionTow";
import { usePosts } from "@/app/context/PostsContext";

export default function HomeSectionTow(){

    // const main_post_in_section_tow = posts[0];
    const {posts} = usePosts();
    const posts_in_left = posts.slice(12, 16);
    const posts_in_right = posts.slice(16, 20);




    return(
        <div className="HomeSectionTow" >
            <PostsInLeft posts_in_left={posts_in_left} />
            <MainPostInSectionTow />
            <PostsInLeft posts_in_left={posts_in_right}/>

        </div>
    )
}
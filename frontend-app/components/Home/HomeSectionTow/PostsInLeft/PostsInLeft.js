"use client"


import { use, useEffect, useState } from 'react';
import MainPostInLeft from './MainPostInLeft/MainPostInLeft';
import OtherPostsInLeft from './OtherPostsInLeft/OtherPostsInLeft';
import './PostsInLeft.css';
import { useTranslation } from 'react-i18next';
import { usePosts } from '@/app/context/PostsContext';

export default function PostsInLeft({posts_in_left}){

    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;


    const [min_post_left, setMin_post_left] = useState('');
    const [other_posts_in_left, setOther_posts_in_left] = useState([]);

    useEffect(() => {
        if (posts_in_left && posts_in_left.length > 0) {
            console.log(1);
            
            console.log(posts_in_left[0]);
            setMin_post_left(posts_in_left[0])
            setOther_posts_in_left(posts_in_left.slice(1, 4));
            console.log(1);

        } else {
            console.log("posts_in_left is empty or undefined");
        }
    }, [posts_in_left]);



    return(
        <div className="PostsInLeft" >
            <MainPostInLeft min_post_left={min_post_left}/>

            <div className='ParentOtherPostsInLeft'>
            {other_posts_in_left.map((post)=>{
                if(!post || !post.translations){
                    return null;
                }
                const translation = post.translations?.find(t => t.locale === currentLanguage) || post;
                return(
                    
                        <OtherPostsInLeft key={post.id} post={post} translation={translation} />
                    
                )
            })}
            
            </div>
        </div>
    )
}
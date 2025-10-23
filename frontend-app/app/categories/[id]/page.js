"use client"

import './Posts.css';
import { useEffect, useState } from 'react';
import { useTranslation } from 'react-i18next';
import axios from 'axios';
import { useParams } from 'next/navigation';
import Post from '@/components/Post/Post';

export default function Posts(){

    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;
    const {id} = useParams();

    const [posts, setPosts] = useState([]);

    useEffect(()=>{
        getPosts();
    },[id])



    const getPosts = async ()=>{
        const data = await axios.get('http://127.0.0.1:8000/api/category/'+id)
        .then((response)=>{
            setPosts(response.data.posts)

        }).catch((error)=>{
            console.log(error)
        })
    }
    
    return(
        <div className='Posts' >
            {posts.map((post)=>{
                if(!post || !post.translations){
                    return null;
                }
                const translation = post.translations?.find(t => t.locale === currentLanguage) || post;
                return(
                    <Post key={post.id || post.slug} post={post} translation={translation} />
                )
            })}
            
           
            
        </div>
    )
}
"use client"

import { useParams } from 'next/navigation'; 
import './PostDetails.css';
import { useEffect, useState } from 'react';
import axios from 'axios';
import { useTranslation } from 'react-i18next';


export default function PostDetail(){
    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;


    const {id} = useParams();

    const [post, setPost] = useState('');

    useEffect(()=>{
        getPost();
    },[id])

    const getPost = async()=>{
        await axios.get(`http://127.0.0.1:8000/api/post/${id}`)
        .then((response)=>{
            setPost(response.data.post)
            console.log(response.data.post);
            
            
        }).catch((error)=>{
            console.log(error);
            
        })
        
    }

    if(!post){
        return <p>جاري تحميل البيانات...</p>;
    }


    const translation = post.translations?.find(t => t.locale === currentLanguage) || post;


    return(
        <div className="PostDetail" >
            <img src={`http://127.0.0.1:8000/${post.image}`} />
            <h2>{translation.title}</h2>
            <p>{translation.description}</p>
        </div>
    )
}
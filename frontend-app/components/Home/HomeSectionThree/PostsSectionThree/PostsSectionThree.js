"use client"

import Link from 'next/link';
import './PostsSectionThree.css';
import { usePosts } from '@/app/context/PostsContext';
import { useTranslation } from 'react-i18next';

export default function PostsSectionThree(){
    const {posts} = usePosts();
    const sectionThree = posts.slice(21,24);

    const {i18n} = useTranslation();
    const currentLanguage = i18n.language;
    
    
    return(
        <div className='HomeSectionThree' >
            {sectionThree.map((post)=>{
                const translation = post.translations?.find(t => t.locale === currentLanguage) || post;
                return(
                            <Link href={`/post/${post.id}`}  className="PostsSectionThree" >
            <img src={`http://127.0.0.1:8000/${post.image}`} />
            <h2>{translation.title}</h2>
            <p>{translation.description}</p>
        </Link>
                )
            })}
        </div>
    )
}
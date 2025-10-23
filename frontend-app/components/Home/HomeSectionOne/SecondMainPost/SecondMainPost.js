"use client"

import { usePosts } from '@/app/context/PostsContext';
import './SecondMainPost.css';
import { useTranslation } from 'react-i18next';
import Link from 'next/link';

export default function SecondMainPost() {

    const {posts} = usePosts();
    const second_main_post  = [posts[1], posts[2]];

    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;




    return(
        <div className='SecondMainPost' >
            {second_main_post.map((post)=>{

                if (!post || !post.translations){
                    return null;
                }
                const translation = post.translations?.find(t => t.locale === currentLanguage) || post;

                return(
                    <Link href={`/post/${post.id}`} key={post.id} className="SecondMainPostLink" >
            
                    <img src={`http://127.0.0.1:8000/${post.image}`} />
                    <h2>{translation.title}</h2>
                    <p>{translation.description}</p>
        
                </Link>
                )

            })}

        </div>

    )
}
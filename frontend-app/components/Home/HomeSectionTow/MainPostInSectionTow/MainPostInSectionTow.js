"use client"

import { useTranslation } from 'react-i18next';
import './MainPostInSectionTow.css';
import { usePosts } from '@/app/context/PostsContext';
import Link from 'next/link';

export default function MainPostInSectionTow(){
    const { i18n} = useTranslation();
    const currentLanguage = i18n.language;

    const {posts} = usePosts();

    const main_post_in_section_tow = posts[11];

    if(!main_post_in_section_tow){
        return null;
    }

    const translation = main_post_in_section_tow.translations?.find(t => t.locale === currentLanguage) || main_post_in_section_tow;


    return(
        <Link href={`/post/${main_post_in_section_tow.id}`} className="MainPostInSectionTow" >
            <img src={`http://127.0.0.1:8000/${main_post_in_section_tow.image}`} />
            <h2>{translation.title}</h2>
            <p>{translation.description}</p>
            <hr/>
        </Link>
    )
}
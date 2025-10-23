"use client"

import './MainPost.css';
import { usePosts } from '@/app/context/PostsContext';
import Link from 'next/link';
import { useTranslation } from 'react-i18next';

export default function MainPost() {
    const {posts} = usePosts();
    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;



    // if (!mainPost) {
    //     return null;
    // }

    const translation = posts[0].translations?.find(t => t.locale === currentLanguage) || posts[0];

    return (
        <Link href={`/post/${posts[0].id}`} className="main-post">
            <h2>{translation.title}</h2>
            <img src={`http://127.0.0.1:8000/${posts[0].image}`} alt="صورة المقال" />
            <p>{translation.description}</p>
        </Link>
    );
}

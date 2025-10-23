import { useTranslation } from 'react-i18next';
import './ThirdMainPost.css';
import { usePosts } from '@/app/context/PostsContext';
import Link from 'next/link';

export default function ThirdMainPost(){

    const {posts} = usePosts();
    const third_main_post = [posts[3], posts[4], posts[5], posts[6], posts[7], posts[8], posts[9], posts[10]];

        const { i18n } = useTranslation();
        const currentLanguage = i18n.language;
    return(
        <div className='testthird' >
            {third_main_post.map((post)=>{
                if(!post || !post.translations){
                    return null;
                }
                const translation = post.translations?.find(t => t.locale === currentLanguage) || post;
                return(
                    
                <Link key={post.id} href={`/post/${post.id}`} className="ThirdMainPost">
                <img src={`http://127.0.0.1:8000/${post.image}`} />

                <h2>{translation.title}</h2>

            </Link>
                )
            })}



        </div>
    )
}
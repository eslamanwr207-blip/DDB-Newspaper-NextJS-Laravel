import Link from 'next/link';
import './MainPostInLeft.css';
import { useTranslation } from 'react-i18next';


export default function MainPostInLeft({min_post_left}){
    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;

    if(!min_post_left){
        return null;
    }

    const translation = min_post_left.translations?.find(t => t.locale === currentLanguage) || min_post_left;
    return(
        <Link href={`/post/${min_post_left.id}`} className="MainPostInLeft" >
            <img src={`http://127.0.0.1:8000/${min_post_left.image}`} />
            <h2>{translation.title}</h2>
            <p>{translation.description}</p>
        </Link>
    )
}
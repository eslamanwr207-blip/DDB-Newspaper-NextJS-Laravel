import Link from 'next/link';
import './OtherPostsInLeft.css';

export default function OtherPostsInLeft({key, post, translation}){
    return(
        <Link href={`/post/${post.id}`} key={key} className="OtherPostsInLeft" >
            <img className=".OtherPostsInLeft_img" src={`http://127.0.0.1:8000/${post.image}`} />
            <h2>{translation.title}</h2>
        </Link>
    )
}
import Link from 'next/link';
import './Post.css';

export default function Post({post, translation}){
    return(
        <Link href={`/post/${post.id}`} key={post.id} className="Post" >
            <img src={`http://127.0.0.1:8000/${post.image}`} />
            <h2>{translation.title}</h2>
        </Link>
    )
}
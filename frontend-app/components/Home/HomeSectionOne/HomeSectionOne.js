"use client"

import { usePosts } from "@/app/context/PostsContext";
import MainPost from "./MainPost/MainPost";
import SecondMainPost from "./SecondMainPost/SecondMainPost";
import ThirdMainPost from "./ThirdMainPost/ThirdMainPost";
import './HomeSectionOne.css';

export default function HomeSectionOne(){
  const { posts } = usePosts();

  if (!posts.length) return <p>لا توجد منشورات متاحة.</p>;

  return (
    <div className="HomeSectionOne"  >
        <MainPost/>
        <SecondMainPost/>
        <ThirdMainPost/>
    </div>
  );
}
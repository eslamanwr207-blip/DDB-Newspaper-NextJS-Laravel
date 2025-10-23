"use client"

import { createContext, useContext, useState } from "react";
const PostsContext = createContext();

export default function PostsProvider({children, initialPosts=[]}){
    const [posts, setPosts] = useState(initialPosts);

    return(
        <PostsContext.Provider value={{posts, setPosts}}>
            {children}
        </PostsContext.Provider>
    )
}

export function usePosts(){
    return useContext(PostsContext)
}
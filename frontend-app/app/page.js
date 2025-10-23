import HomeSectionOne from "@/components/Home/HomeSectionOne/HomeSectionOne";
import PostsProvider from "./context/PostsContext";
import "./globals.css";
import HomeSectionTow from "@/components/Home/HomeSectionTow/HomeSectionTow";
import HomeSectionThree from "@/components/Home/HomeSectionThree/HomeSectionThree";


export default async function Home() {
  const res = await fetch("http://127.0.0.1:8000/api/posts", {
    cache: "no-store",
  });

  const data = await res.json();
  const posts = data?.posts || [];

  return (
    <div className="home" >
      <PostsProvider initialPosts={posts}>
        <HomeSectionOne />
                    <br/>
            <br/>
            <br/>
            <hr/>
            <HomeSectionTow/>
                        <br/>
            <br/>
            <HomeSectionThree/>
      </PostsProvider>
    </div>
  );
}

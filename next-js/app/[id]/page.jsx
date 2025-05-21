import { getPageById } from '@/app/services/pageService'
import { notFound } from 'next/navigation';

const Page = async ( { params } ) => {
    
    const { id } = await params

    const pageData = await getPageById(id)

    if(!pageData) {

        notFound();
    }

    // console.log(pageData)    

    return (
        <>
            <div>Page</div>
            <div>Content</div>
        </>        
    );
};

export default Page;
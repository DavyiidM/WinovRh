import VacancyInterface from '@/services/vacancies/vacancy.interface'

export default interface CandidateInterface {
    id: string,
    name: string,
    email:string,
    linkedin:string,
    github:string,
    phone:string,
    resume:string,
    created_at: string,
    vacancies: VacancyInterface[]
}
